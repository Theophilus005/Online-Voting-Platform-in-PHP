 var voterSection = document.getElementsByClassName("vote-section")[0];
 var header = document.getElementsByClassName("header")[0];

var laodingLottie = lottie.loadAnimation({
    container: document.getElementById('loading-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/loading.json'
  })


  function vote(name, pos) {
    var index = Number(pos);
   var id = document.getElementsByClassName("vote-button")[index].id;
   //section ids array;
    var sections = ["organizer", "pro", "finance", "secretary", "vice", "president"];

   var xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
       if(xhr.readyState == 4 && xhr.status == 200) {
        document.getElementsByClassName("loading-main-div")[0].style.display="flex";

                var response = Number(xhr.responseText);
                //document.getElementById("section").innerHTML = response;
                //alert(Number(response)+1);
                 
                    setTimeout(()=>{
                        for(i=0; i<sections.length; i++) {
                        if(i == response+1) {
                            document.getElementsByClassName("loading-main-div")[0].style.display="none";
                            document.getElementById(sections[response+1]).style.display="block";

                            } else if (i == 5) {
                                document.getElementsByClassName("loading-main-div")[0].style.display="none";
                                document.getElementById(sections[i]).style.display="none";
                            }
                             else {
                                document.getElementsByClassName("loading-main-div")[0].style.display="none";
                                document.getElementById(sections[i]).style.display="none";

                            }
                        }

                        if(response == 5) {
                            document.getElementsByClassName("results-main-div")[0].style.display="flex";
    
                        }
                    
                    },2000);
                   
                
    
            }
       
   }

   xhr.open("GET", "votemanager.php?name="+name+"&pos="+index);
   xhr.send();
  }


  function updateVotes() {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
          if(xhr.readyState == 4 && xhr.status == 200) {
              var progressBars = document.querySelectorAll("#progress-inner-div");
              var votePercentageDivs = document.querySelectorAll("#vote-percentage");
              var response = xhr.responseText;
              var voteArray = response.split(" ");
              var votes = voteArray.length;
              var presidentArray = [voteArray[votes-1], voteArray[votes-2]];
              var viceArray = [voteArray[votes-3], voteArray[votes-4], voteArray[votes-5]];
              var secretaryArray = [voteArray[votes-6], voteArray[votes-7], voteArray[votes-8]];
              var financeArray = [voteArray[votes-9], voteArray[votes-10], voteArray[votes-11]];
              var proArray = [voteArray[votes-12], voteArray[votes-13]];
              var organizerArray = [voteArray[votes-14], voteArray[votes-15]];
              presidentArray.reverse();
              viceArray.reverse();
              secretaryArray.reverse();
              financeArray.reverse();
              proArray.reverse();
              organizerArray.reverse();
              
              var presidentTotalVotes = Number(presidentArray[0]) + Number(presidentArray[1]);
              var viceTotalVotes = Number(viceArray[0]) + Number(viceArray[1]) + Number(viceArray[2]);
              var secretaryTotalVotes = Number(secretaryArray[0]) + Number(secretaryArray[1]) + Number(secretaryArray[2]);
              var financeTotalVotes = Number(financeArray[0]) + Number(financeArray[1]) + Number(financeArray[2]);
              var proTotalVotes = Number(proArray[0]) + Number(proArray[1]);
              var organizerTotalVotes = Number(organizerArray[0]) + Number(organizerArray[1]);

              var votesTotalArray = [presidentTotalVotes, viceTotalVotes, secretaryTotalVotes, financeTotalVotes, proTotalVotes, organizerTotalVotes];
              var votesMergedArray = presidentArray.concat(viceArray, secretaryArray, financeArray, proArray, organizerArray);
              
              //For storing percentages
              var presidentPercentages = [];
              var vicePercentages = [];
              var secretaryPercentages = [];
              var financePercentages = [];
              var proPercentages = [];
              var organizerPercentages = [];
            
              //filling president percentages
              for(i=0; i < presidentArray.length; i++) {
                  var percentage = (presidentArray[i]/presidentTotalVotes) * 100
                  presidentPercentages[i] = percentage;
              }

                //filling vice percentages
                for(i=0; i < viceArray.length; i++) {
                    var percentage = (viceArray[i]/viceTotalVotes) * 100
                    vicePercentages[i] = percentage;
                }

                //filling secretary percentages
              for(i=0; i < secretaryArray.length; i++) {
                var percentage = (secretaryArray[i]/secretaryTotalVotes) * 100
                secretaryPercentages[i] = percentage;
            }

              //filling finance percentages
              for(i=0; i < financeArray.length; i++) {
                var percentage = (financeArray[i]/financeTotalVotes) * 100
                financePercentages[i] = percentage;
            }

              //filling pro percentages
              for(i=0; i < proArray.length; i++) {
                var percentage = (proArray[i]/proTotalVotes) * 100
                proPercentages[i] = percentage;
            }

              //filling organizer percentages
              for(i=0; i < organizerArray.length; i++) {
                var percentage = (organizerArray[i]/organizerTotalVotes) * 100
                organizerPercentages[i] = percentage;
            }

            var mergedPercentages = presidentPercentages.concat(vicePercentages, secretaryPercentages, financePercentages, proPercentages, organizerPercentages);
           // console.log(mergedPercentages[2]);


              //console.log(organizerArray[0] + " " + organizerArray[1]);
              //var reversedVotes = voteArray.reverse();
              //alert(voteArray[7]);
              for(i=0; i<votes; i++) {
                  document.getElementsByClassName("vote-count")[i].innerHTML = voteArray[i];
                  document.getElementsByClassName("stat-vote")[i].innerHTML = "("+votesMergedArray[i]+" votes)";
                  progressBars[i].style.width = mergedPercentages[i]+"%"; 
                  votePercentageDivs[i].innerHTML = mergedPercentages[i].toFixed(1) + "%";
              }

              for(i=0; i<votesTotalArray.length; i++) {
                document.getElementsByClassName("stat-total-votes")[i].innerHTML = votesTotalArray[i] + " votes";
            }

              
              setTimeout(updateVotes, 1000);
              
          }
      }

      xhr.open("GET", "voteCounter.php?update_vote=true");
      xhr.send();
  }

  setTimeout(updateVotes, 1000);

  function sectionCheck() {
      //alert("page loaded");
      var sectionArray =  ["organizer", "pro", "finance", "secretary", "vice", "president"];
    var section = Number(document.getElementById("section").value);
    //alert(section);
    
      //var section = -1;
      if(section == -1) {
        document.getElementById("organizer").style.display="block";
        document.getElementById("pro").style.display="none";
        document.getElementById("finance").style.display="none";
        document.getElementById("secretary").style.display="none";
        document.getElementById("vice").style.display="none";
        document.getElementById("president").style.display="none";
        document.getElementsByClassName("results-main-div")[0].style.display="none";

      }
      else if(section == 0) {
          document.getElementById("organizer").style.display="none";
          document.getElementById("pro").style.display="block";
          document.getElementById("finance").style.display="none";
          document.getElementById("secretary").style.display="none";
          document.getElementById("vice").style.display="none";
          document.getElementById("president").style.display="none";
          document.getElementsByClassName("results-main-div")[0].style.display="none";

      } else if(section == 1) {
        document.getElementById("organizer").style.display="none";
        document.getElementById("pro").style.display="none";
        document.getElementById("finance").style.display="block";
        document.getElementById("secretary").style.display="none";
        document.getElementById("vice").style.display="none";
        document.getElementById("president").style.display="none";
        document.getElementsByClassName("results-main-div")[0].style.display="none";

      } else if(section == 2) {
        document.getElementById("organizer").style.display="none";
        document.getElementById("pro").style.display="none";
        document.getElementById("finance").style.display="none";
        document.getElementById("secretary").style.display="block";
        document.getElementById("vice").style.display="none";
        document.getElementById("president").style.display="none";
        document.getElementsByClassName("results-main-div")[0].style.display="none";

      } else if(section == 3) {
        document.getElementById("organizer").style.display="none";
        document.getElementById("pro").style.display="none";
        document.getElementById("finance").style.display="none";
        document.getElementById("secretary").style.display="none";
        document.getElementById("vice").style.display="block";
        document.getElementById("president").style.display="none";
        document.getElementsByClassName("results-main-div")[0].style.display="none";

      } else if(section == 4) {
        document.getElementById("organizer").style.display="none";
        document.getElementById("pro").style.display="none";
        document.getElementById("finance").style.display="none";
        document.getElementById("secretary").style.display="none";
        document.getElementById("vice").style.display="none";
        document.getElementById("president").style.display="block";
        document.getElementsByClassName("results-main-div")[0].style.display="none";

      } else if(section == 5) {
        document.getElementById("organizer").style.display="none";
        document.getElementById("pro").style.display="none";
        document.getElementById("finance").style.display="none";
        document.getElementById("secretary").style.display="none";
        document.getElementById("vice").style.display="none";
        document.getElementById("president").style.display="none";
        document.getElementsByClassName("results-main-div")[0].style.display="flex";
      }  

    
  }



