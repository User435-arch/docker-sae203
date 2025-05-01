/*const videos = [
    "Aiobahn feat. KOTOKO - INTERNET YAMERO (Official Music Video)"
];


function playVideo(){
    const video = document.getElementById("videoPlayer");
    video.src = "video/" + videos[0] + ".mp4";
    video.play();
    putTitle()
}

function putTitle(){
    const title = document.getElementById("titreVideo");
    title.innerHTML = videos[0];
}

window.onload = playVideo();*/

const urlParams = new URLSearchParams(window.location.search);
const videoId = urlParams.get('id');

fetch('data.json')
    .then(res => res.json())
    .then(data => {
        const videoData = data.find(item => item.id === videoId);
        if (videoData) {
            const videoSource = document.getElementById('videoSource');
            const videoPlayer = document.getElementById('videoPlayer');
            videoSource.src = videoData.video;
            videoPlayer.load();
            videoPlayer.play();
        } else {
            alert('Video not found.');
        }
    })
    .catch(err => console.error('Error loading video data:', err));