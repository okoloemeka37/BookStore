

if (document.querySelector("#genre")) {

    let genres=[
       "Fiction",
       "Poetry",
       "Nonfiction",
       "Drama",
       "Romance",
       "Mystery",
       "Thriller",
       "Science Fiction",
       "Fantacies",
       "Horror",
       "History",
   
]

    let genre_input=document.querySelector("#genre");
    let holder=document.querySelector(".dropsHolder");

    genre_input.addEventListener("input",()=>{

        document.querySelectorAll(".drops").forEach(drop=>{
          
               let text=drop.innerHTML.toUpperCase();
               let getting=genre_input.value.toUpperCase();

               if (text.indexOf(getting)== -1) {
                drop.style.display='none'
               }else{
                drop.style.display='block'
               }
          
            })
           
    })



    genre_input.addEventListener("blur",()=>{
        

    document.querySelectorAll(".drops").forEach(drop=>{
     drop.addEventListener("click",() =>{
        document.querySelector("#genre").value=drop.innerHTML;
        document.querySelector(".dropsHolder").innerHTML=''
     })
    
    })  
setTimeout(() => {
    document.querySelector(".dropsHolder").innerHTML=''
}, 300);
     
    })




    genre_input.addEventListener("focus",()=>{

        if(document.querySelectorAll(".drops")){
            document.querySelectorAll(".drops").forEach(drop=>{
                drop.remove()
            })  
        }


genres.forEach(gen => {
    let p=document.createElement("p")
    p.className="drops";
    p.innerHTML=gen;
    holder.append(p)
});


if(document.querySelectorAll(".drops")){
    document.querySelectorAll(".drops").forEach(drop=>{
     drop.addEventListener("click",() =>{
        document.querySelector("#genre").value=drop.innerHTML;
        document.querySelector(".dropsHolder").innerHTML=''
     })
    
    })  
} 
    });


  

}