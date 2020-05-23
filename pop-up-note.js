          var count=0;
        // for my add event pop up box
          var modal = document.getElementById("myModal");
          var btn = document.getElementById("addEvent");
          var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
              modal.style.display = "block";
            }
          span.onclick = function() {
              modal.style.display = "none";
            }

        // for my change theme pop up box
          var change = document.getElementById("theme-landscape");
          var theme = document.getElementById("theme");
          var span1 = document.getElementsByClassName("close")[1];

          change.onclick = function() {
              theme.style.display = "block";
              
            }
          span1.onclick = function() {
              theme.style.display = "none";
            }
        // for my infobox pop up box
          var info = document.getElementById("infoBox");
          var span2 = document.getElementsByClassName("close")[2];

        // ajax, load infoBox.php that contain helpful information
          function info_Box(){
              info.style.display = "block";
              $.ajax({url: "infoBox.php", success: function(data){
                $("#box-content").html(data);
            }});
          }
          
          span2.onclick = function() {
              info.style.display = "none";
            }
          
          // for my update theme onclick
          function update(theme_color){
              var x = document.getElementsByTagName("BODY")[0];
              var y = document.getElementsByClassName("color");
              x.style.backgroundImage = document.getElementById(theme_color).style.backgroundImage;
              theme.style.display = "none";
              var i;
              for (i = 0; i < y.length; i++) {
                  if(theme_color=='giraffe'){
                      y[i].style.backgroundColor="#ede2e0";
                      y[i].style.color="#5c5250";
                  }
                  if(theme_color=='brown'){
                      y[i].style.backgroundColor = "#dbbdab";
                      y[i].style.color="#FEFDFD";
                  }
                  if(theme_color=='bread'){
                      y[i].style.backgroundColor = "#e8dca7";
                      y[i].style.color="#FEFDFD";
                  }
                  if(theme_color=='leaves'){
                      y[i].style.backgroundColor = "#95b7ac";
                      y[i].style.color="#FEFDFD";
                  }
                  if(theme_color=='colorful'){
                      y[i].style.backgroundColor = "#eac8cf";
                      y[i].style.color="#FEFDFD";
                  }
                  if(theme_color=='blueDream'){
                      y[i].style.backgroundColor = "#b8bed3";
                      y[i].style.color="#FEFDFD";
                  }
              }
            }
          // for my current day in default when the page load
          function current(){
              var today = new Date();
              var days =['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
              var day = days[ today.getDay() ];
              var dd = today.getDate();
              var mm = (today.getMonth()+1);
              var yyyy = today.getFullYear();
              today = day + '<br>' + mm+'/'+dd+'/'+yyyy;
              document.getElementById("cur-day").innerHTML= today;
              
          }
        // get the inpurs from user when they click add event button 
          function addList(){
              var title = document.getElementById("title").value;
              var type = document.getElementById("type").value;
              var date = document.getElementById("date").value;
              var time= document.getElementById("time").value;
              var x = title.charAt(0);
              var d = new Date(Date.parse(date));
              day = d.getDate();
              
              if(day>=30){
                  day=1;
              }
              else{
                day+=1
              }
              if(document.getElementById(day).innerHTML==""){
                  document.getElementById(day).value="";
                }
              
              // all inputs are required
              if (title==''||type==''||date==''||time==''){
                    alert("All fields are required.");
                  return false;
                }
              // in case the number will mess up with the icon
              if(isNaN(x)==false){
                  alert("Please enter alphabet for the first character.");
                  return false;
              }
              else{
                  
                  if(type=="assignment"){
                      document.getElementById(day).innerHTML+=`<li id="t${count}" class="elementA" oncontextmenu="promptWindow(${count})">&#128221${title}</li>`;
                      document.getElementById(day).value+=`<div class="todolist" id="item${count}"><p class="element">${title}</p><p class="element" contenteditable="true">${time}</p><p class="element check"  id="icon${count}" onclick="checked(${count})">&#9744</p></div>`;
                    }
                  if(type=="test"){
                      document.getElementById(day).innerHTML+=`<li id="t${count}" class="elementT" oncontextmenu="promptWindow(${count})">&#128128${title}</li>`;
                      document.getElementById(day).value+=`<div class="todolist" id="item${count}" contenteditable="true"><p class="element">${title}</p><p class="element">${time}</p><p class="element check"  id="icon${count}" onclick="checked(${count})">&#9744</p></div>`;
                  }
                  if(type=="event"){
                  document.getElementById(day).innerHTML+=`<li id="t${count}" class="elementE" oncontextmenu="promptWindow(${count})">&#10024${title}</li>`;
                      document.getElementById(day).value+=`<div class="todolist" id="item${count}" contenteditable="true"><p class="element">${title}</p><p class="element">${time}</p><p class="element check"  id="icon${count}" onclick="checked(${count})">&#9744</p></div>`;
                  }
                  if(type=="reminder"){
                      document.getElementById(day).innerHTML+=`<li id="t${count}" class="elementR" oncontextmenu="promptWindow(${count})">&#9200${title}</li>`;
                      document.getElementById(day).value+=`<div class="todolist" id="item${count}" ondblclick="promptWindow(${count})" contenteditable="true"><p class="element" id="title${count}">${title}</p><p class="element" id="time${count}">${time}</p><p class="element check"  id="icon${count}" onclick="checked(${count})">&#9744</p></div>`;

                  }
                  
                  count++;
                  clean();   
                  modal.style.display = "none";
              }          
          }
            // clean all the input when click clean button on the pop up box
          function clean(){
                document.getElementById("title").value = "";
                document.getElementById("type").value = "";
                document.getElementById("date").value = "";
                document.getElementById("time").value = "";
          }

            // get the day when user click certain day on the calendar and will show the events in that day on the list area on the left side
            // ex: if i click 9th on the calendar, the list will show up all events i add on 9th
          function show(day){
              
              var d = document.getElementById(day).value;
              document.getElementById("current-day-header").innerHTML= "May/"+day+"/2020";
              document.getElementById("current-day-list").innerHTML= d;
              document.getElementById("edit").style.display="block";
              var u = document.getElementById("edit");
              
              // if user click save my edit button, it will update when you revisit(incluse time and check mark)
              u.onclick=function(){
                  var userVersion = document.getElementById("current-day-list").innerHTML;
                  document.getElementById(day).value=userVersion;
                  alert("Your edit has been saved");
                  console.log(userVersion);
                  if(document.getElementById("current-day-list").innerHTML==""){
                      document.getElementById("edit").style.display="none";
                  }
                  
              }
              
              
          }
            // if you click check box, it will change to check mark which show you finish this event
          function checked(itemID){
              document.getElementById("icon" + itemID).value="&#9745";
              document.getElementById("icon" + itemID).innerHTML="&#9745";
              
          }

        // when you try to delete an event for typo or what, right click the event on the calendar
        // it will comfrim with you do you want to delete
        // if yes, it will delete successfully.
        // but make sure to save the edit for the to do list
          function promptWindow(itemID){
              
              var result = confirm("Want to delete?");
              if (result) {
                  var x = document.getElementById("t" + itemID);
                  x.remove();    
                  
                  var i = document.getElementById("item"+itemID);
                  i.remove();
                  
                }
          }
        // JQery UI : make the sticker draggable
        $( function() {
            $( ".sticker" ).draggable();
          } );