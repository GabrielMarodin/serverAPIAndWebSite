var f_duration =0; //store duration

document.getElementById('audio').addEventListener('canplaythrough', function(e){
 //add duration in the input field #f_du
 f_duration = Math.round(e.currentTarget.duration);

 document.getElementById('duration').value = f_duration;

 URL.revokeObjectURL(obUrl);
 
});

//when select a file, create an ObjectURL with the file and add it in the #audio element
var obUrl;
document.getElementById('fileToUpload').addEventListener('change', function(e){

 var file = e.currentTarget.files[0];

 //check file extension for audio/video type

 if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){

    obUrl = URL.createObjectURL(file);
    document.getElementById('audio').setAttribute('src', obUrl);

 }
});