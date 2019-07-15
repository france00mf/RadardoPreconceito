function openmenu(){
    const media = window.matchMedia("(max-width:768px)")
    if(media.matches){
    let menuvalue = document.getElementById('sidebar');
    let topvalue = document.getElementById('conteudo');
    topvalue.style.marginleft='15%';
    menuvalue.style.width = '100%';
    }
    else{
        let button = document.getElementById('close');
        let menuvalue = document.getElementById('sidebar');
        let topvalue = document.getElementById('conteudo');
        topvalue.style.marginleft='15%';
        menuvalue.style.width = '15%';
        button.style.display = 'none';
    }
}
function closemenu(){
    let menuvalue = document.getElementById('sidebar');
    let topvalue = document.getElementById('conteudo');
    menuvalue.style.width = '0%';
    topvalue.style.marginleft='0%';
    
}
