var x=document.getElementById("login");
var y=document.getElementById("signup");
var z=document.getElementsByClassName("signup-btn");
function signup(){
    x.style.left="-300px";
    y.style.left="50px";
    z.style.left="110px";
}
function login(){
    x.style.left="50px";
    y.style.left="450px";
    z.style.left="0";
}


const search=document.querySelector('.news');
const input=document.querySelector('.news-input');
const list=document.querySelector('.list');
search.addEventListener('submit',retrieve)
function retrieve(e){
    e.preventDefault()
    const key='9ea4b26a556f40d5a8ee4730bd52647e'
    let topic=input.value;
    fetch(`https://newsapi.org/v2/everything?q=${topic}&apiKey=${key}`)
    .then((res)=>{
        return res.json()
    }).then((data)=>{
        console.log(data)
         data.articles.forEach(article=>{
             let li=document.createElement('li');
             let a=document.createElement('a');
             a.setAttribute('href',article.url);
             a.setAttribute('target','_blank')
             a.textContent=article.title;
             li.appendChild(a);
             list.appendChild(li);
         })
    })    
}
