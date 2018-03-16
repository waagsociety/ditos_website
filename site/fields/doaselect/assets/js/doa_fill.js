var eventTypes = ["Workshops","Workshops","Workshops","Workshops","Interactive Travelling Exhibition","Workshops","Conference / Seminar","Conference / Seminar","Workshops","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Workshops","Interactive Travelling Exhibition","Workshops","Conference / Seminar","Conference / Seminar","Online activities","Interactive Travelling Exhibition","Workshops","Online activities","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Workshops","Delegations visits","Online activities","Workshops","Workshops","Workshops","Workshops","Workshops","Science Cafes / Public Screenings","Workshops","Online activities","Workshops","Workshops","Workshops","Online activities","Science Cafes / Public Screenings","Online activities","Online activities","Online activities","Workshops","Workshops","Science Cafes / Public Screenings","Workshops","Interactive Travelling Exhibition","Workshops","Workshops","Science Cafes / Public Screenings","Conference / Seminar","Conference / Seminar","Workshops","Interactive Travelling Exhibition","Workshops","Online activities","Science Cafes / Public Screenings","Interactive Travelling Exhibition","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Workshops","Online activities","Workshops","Workshops","Interactive Travelling Exhibition","Interactive Travelling Exhibition","Conference / Seminar","Delegations visits","Interactive Travelling Exhibition","Online activities","Science Cafes / Public Screenings","Workshops","Online activities","Interactive Travelling Exhibition","Online activities","Online activities","Interactive Travelling Exhibition"];

var workpackages = ["1","1","1","1","1","2","1","1","1","1","1","3","2","2","2","3","1","2","2","1","1","2","2","3","4","1","1","2","2","2","2","2","2","3","4","4","4","1","3","3","1","3","3","1","3","4","2","1","1","1","4","1","4","2","2","3","2","3","2","1","4","2","2","2","2","3","","","","","","","3","2","1","2","2"];

$(function() {//document ready

    var nameField = $('#form-field-event_name')[0];
    var wpField = $('#form-field-work_package')[0];
    var typeField = $('#form-field-activity')[0];

    nameField.addEventListener("change", function() {

        var index = nameField.selectedIndex - 1;//the first value is a label, not a value
        
        //update the two readonly fields via the mapping
        if(index > -1){
           
            //parse the wp number
            var wp = parseInt(workpackages[index]);
            var wp_index = -1;//the default empty value
            if(!isNaN(wp)){
                wp_index = wp - 1;//index starts at 0     
            }
            wpField.value = wp_index;
            
            var eventType = eventTypes[index];
            typeField.value = eventType;
        }
        else //the empty selector
        {
            wpField.value = "";
            typeField.value = "";
        }
    });
});
