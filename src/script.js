const drop= document.querySelector('#drop-menu');
const items= document.querySelector('.items');
const navLogo= document.querySelector('#logo');

const dropMenu = () =>{
    drop.classList.toggle('is-active');
    items.classList.toggle('active');
   
};

drop.addEventListener('click', dropMenu);

var data= {
    chatinit:{
        title: ["Hello! Welcome to Bagong Silang Group of Doctors.","How may I help you?"],
        options: ["Services", "About Us","Facebook"]
    },
    about: {
        title:["ABOUT US"],
        options:['Bagong Silang Group of Doctors, is a reknown Diagnostic Clinic, located in Bagong Silang Caloocan City, with astrong focus on providing best medical care, our highly trained Doctors and Friendly staff and ensure expetional selfcare services for all patience. Our clinic is committed to upholding standard of excellent in diagnostic medical services, catering to the diverse healthcare.'],
        url : {
            
        }
    },
    
    Set: {
        title:["What are the Service Price & Doctors Schedule?","How to Set Appointment?"],
    
    },
    services: {
        title:["Please select one of the below options to proceed further"],
        options:['obgyn','X-ray ','Pedia','Ultrasound','Vaccine'],
        url : {
            
        }
    },
    obgyn: {
        title:["Prices"],
        options:['Pelvic ultrasound - 500','3D Picture Only - 850','4D Picture Only - 1700','Headphones','Speakers'],
        url : {

        }
    },

    ultrasound: {
        title:["Thanks for your response","Here are some beauty products for you","Click on it to know more"],
        options:['Make-up & Nails','Skin Care','Fragrance','Hair care'],
        url : {
            more:"https://www.youtube.com/@webhub/videos",
            link:["#","#","#","#"]
        }
    },

    beauty: {
        title:["Thanks for your response","Here are some beauty products for you","Click on it to know more"],
        options:['Make-up & Nails','Skin Care','Fragrance','Hair care'],
        url : {
            more:"https://www.youtube.com/@webhub/videos",
            link:["#","#","#","#"]
        }
    },


    facebook: {
        title: ["Thanks for your response"],
        options: ["facebook.com"],
        url: {
            more:"https://www.facebook.com/bagongsilanggroupofdoctors",
            link:["https://www.facebook.com/bagongsilanggroupofdoctors"]
        }
    },

}

document.getElementById("chatbot-toggler").addEventListener("click",showChatBot);
var cbot= document.getElementById("chat-box");

var len1= data.chatinit.title.length;

function showChatBot(){
    console.log(this.innerText);
    if(this.innerText=='Chat with us'){
        document.getElementById('test').style.display='block';
        document.getElementById('chatbot-toggler').innerText='CLOSE CHAT';
        initChat();
    }
    else{
        location.reload();
    }
}

function initChat(){
    j=0;
    cbot.innerHTML='';
    for(var i=0;i<len1;i++){
        setTimeout(handleChat,(i*500));
    }
    setTimeout(function(){
        showOptions(data.chatinit.options)
    },((len1+1)*500))
}

var j=0;
function handleChat(){
    console.log(j);
    var elm= document.createElement("p");
    elm.innerHTML= data.chatinit.title[j];
    elm.setAttribute("class","msg");
    cbot.appendChild(elm);
    j++;
    handleScroll();
}

function showOptions(options){
    for(var i=0;i<options.length;i++){
        var opt= document.createElement("span");
        var inp= '<div>'+options[i]+'</div>';
        opt.innerHTML=inp;
        opt.setAttribute("class","opt");
        opt.addEventListener("click", handleOpt);
        cbot.appendChild(opt);
        handleScroll();
    }
}

function handleOpt(){
    console.log(this);
    var str= this.innerText;
    var textArr= str.split(" ");
    var findText= textArr[0];
    
    document.querySelectorAll(".opt").forEach(el=>{
        el.remove();
    })
    var elm= document.createElement("p");
    elm.setAttribute("class","test");
    var sp= '<span class="rep">'+this.innerText+'</span>';
    elm.innerHTML= sp;
    cbot.appendChild(elm);

    console.log(findText.toLowerCase());
    var tempObj= data[findText.toLowerCase()];
    handleResults(tempObj.title,tempObj.options,tempObj.url);
}

function handleDelay(title){
    var elm= document.createElement("p");
        elm.innerHTML= title;
        elm.setAttribute("class","msg");
        cbot.appendChild(elm);
}


function handleResults(title,options,url){
    for(let i=0;i<title.length;i++){
        setTimeout(function(){
            handleDelay(title[i]);
        },i*500)
        
    }

    const isObjectEmpty= (url)=>{
        return JSON.stringify(url)=== "{}";
    }

    if(isObjectEmpty(url)==true){
        console.log("having more options");
        setTimeout(function(){
            showOptions(options);
        },title.length*500)
        
    }
    else{
        console.log("end result");
        setTimeout(function(){
            handleOptions(options,url);
        },title.length*500)
        
    }
}

function handleOptions(options,url){
    for(var i=0;i<options.length;i++){
        var opt= document.createElement("span");
        var inp= '<a class="m-link" href="'+url.link[i]+'">'+options[i]+'</a>';
        opt.innerHTML=inp;
        opt.setAttribute("class","opt");
        cbot.appendChild(opt);
    }
    

    const isObjectEmpty= (url)=>{
        return JSON.stringify(url)=== "{}";
    }

    console.log(isObjectEmpty(url));
    console.log(url);
    opt.innerHTML=inp;
    opt.setAttribute("class","opt link");
    cbot.appendChild(opt);
    handleScroll();
}

function handleScroll(){
    var elem= document.getElementById('chat-box');
    elem.scrollTop= elem.scrollHeight;
}

