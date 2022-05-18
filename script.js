// function for hamburger menu
    function myFunction() 
    {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") 
        {
            x.style.display = "none";
        } 
        else 
        {
            x.style.display = "block";
        }
    }


//function for form button

function formButton()
{
    let form = document.getElementById("form");
    form.style.display = 'none';

    let mainArea = document.getElementById("mainAreaID");
    mainArea.style.display = 'flex';

}

function addRecord(){
    //proper closing of menu bar
    
    var x = document.getElementById("myLinks");
        if (x.style.display === "block") 
        {
            x.style.display = "none";
        } 
        else 
        {
            x.style.display = "block";
        }
        //display the form
        let form = document.getElementById("form");
        form.style.display = 'block';
        //hide the mainarea text
        let mainArea = document.getElementById("mainAreaID");
        mainArea.style.display = 'none';
}