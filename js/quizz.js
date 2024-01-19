let divQuizz = document.querySelector('#quizz');
let divQuestion = divQuizz.querySelector('#question');
let divReponses = divQuizz.querySelector('#reponses');
let ModeleReponse = divQuizz.querySelector('#templateReponse')

async function getQuestions(){
    const response = await fetch("./scripts_ajax/getQuestions.php");
    const questions = await response.json();
    return questions;
}
getQuestions().then((rt) => {
    if(Array.isArray(rt)){
        console.log(rt);
        let arrQuestions = [];
        rt.forEach((q) => {
            
        });
    }
    else{
        divQuizz.innerHTML = rt;
    }
});