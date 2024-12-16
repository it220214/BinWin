//variablen 
content = document.getElementById('#content');

//valid-Login
function validLogIn(){
    document.body.style = `background:white;`
    document.body.innerHTML = `
    <div id="headerGeneral">
        <img id="logo" src="./Logo_BinWin.png"> 
    </div>

    <div id="content"></div>

    <footer>
        <img onclick="changeSideTo('ranking')" class="icons" src="./icons/ranking.svg">
        <img onclick="changeSideTo('statistic')" class="icons" src="./icons/statistic.svg">
        <p onclick="changeSideTo('points')" class="icons">♻️</p>
        <img onclick="changeSideTo('rewards')" class="icons" src="./icons/trophy.svg">
        <img onclick="changeSideTo('profile')" class="icons" src="./icons/profile.svg">
    </footer>`
}

//Navigation
function changeSideTo(side) {
    content.innerhtml = "";
    switch (side) {
        case 'ranking':
            rankSystem();
            break;
        case 'statistic':
            statisticSystem();
            break;
        case 'points':
            pointsystem();
            break;
        case 'rewards':
            rewardSystem();
            break;
            case 'profile':
            profileSystem();
            break;    
        default:
            break;
    }
}
function rankSystem() {
}
function statisticSystem() {
}
function pointsystem() {
}
function rewardSystem() {
}
function profileSystem() {
}