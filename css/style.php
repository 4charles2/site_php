<?php
	header('content-type:text/css');
echo "
#content{
	display: flex;
	width: 100%;
}
nav li{
    display: inline-block;
}
nav{
	margin: auto;
	margin-bottom: 10px;
    border: 1px solid black;
    border-radius: 15px;
    text-align: center;
    background-color: rgba(255, 255, 0, 0.2);
	width: 95%;
}
#titre_principal{
    text-align: center;
}
u{
    color: #61380B;
}
article{
    padding: 10px;
    margin: 2px;
    border: 1px dashed black;
    border-radius: 20px;
    width: 870px;
    background-color: rgba(255, 0, 0, 0.3);
    word-wrap: break-word;
}
pre{
	border: 1px solid black;
	background-color: black;
}
code{
	background-color: #ccffe6;
    color: blue;
}
pre code{
	background-color: black;
	color: white;
}
.citation{
	border-right: 4px solid #c7c8c8
}
#image{
	height: 400px;
	width: 280px;
    margin-left: auto;
	background-color: rgba(0, 204, 0, 0.42);
	border: 2px solid black;
	border-radius: 20px;
}
img{
    border-radius: 20px;
	margin: 20px;
	z-index: 1;
}
body{
    background-color: rgba(55, 50, 55, 0.5);
    color: black;
	border: 1px solid red;
	width: auto;
	height: 95%;
	padding: 5px;
}
section{
    padding: 30px;
	margin: 10px;
    background-color: rgba(255, 255, 0, 0.2);
    border: 2px solid black;
    border-radius: 25px;
    width: 880px;
}
#first_section{
	overflow: auto;
	overflow-x: hidden;
	width: 950px;
	height: <php //mettre la hauteur de la fenetre re�u par requ�te javascript avant l'envoie des ficchiers css;?>
	margin: auto;
	margin-top: 0px;
	/*position: absolute;*/
/*Pour internet explorer v5+ à vérifier*/
	-ms-scrollbar-3dlight-color: #4FBDDD;
	-ms-scrollbar-arrow-color: #EEE1AE;
	-ms-scrollbar-darkshadow-color: #000000;
	-ms-scrollbar-face-color: #A0CCE0;
	-ms-scrollbar-highlight-color: #F8F2DC;
	-ms-scrollbar-shadow-color: #176F99;
	-ms-scrollbar-track-color: #E7F2FA;
}
/*#link_top_page{
	margin-left: 20px;
	margin-top: -30px;
	width: 800px;
	background: black;
	border: 2px solid black;
	border-radius: 0px 0px 10px 10px;
//	float: left;
	position: fixed;
	text-align: center;
}*/
#first_page{
	margin:5%;
	width: 750px;
}
#first_page article{
	margin: 5px;
	width: 700px;
}
footer{
    clear: both;
    text-align: center;
}
li{
    font-weight: bold;
}
ol p{
    color: rgb(230, 230, 255);
}
table, td, th{
    border: 1px solid black;
    color: #173B0B;
}
th{
    text-align: center;
    color: black;
}
thead{
    text-align: center;
    text-decoration: underline;
}
#lien_hover:hover{
	color: red;
	text-decoration: underline;
}
#paragraphe_hover:hover{
	color: black;
	box-shadow: 8px 8px 1px black;
	border: 1px solid black;
	text-shadow: 1px 1px 0px green;
	background-color: white;
}
#lien_active:active{
	color: black;
	background-color: #FFCC66;
}
#paragraphe_focus:focus{
	background-color: green;
	border-radius: 15px;
	box-shadow: 6px 6px 0px red;
	text-shadow: 2px 2px 0px red;
}
#lien_visited:visited{
	color: #AAA;
}
#chat{
	margin-right: auto;
    padding: 20px;
    background-color: rgba(255, 255, 0, 0.2);
    border: 1px solid black;
    border-radius: 20px;
	width: 300px;
	height: 99%;
	margin-bottom: 5px;
}
#titre_chat{
	text-align: center;
}
#input_chat{
	padding: 2px;
}
label{
	display: block;
}
legend{
	color: #DF3F3F;
	font-weight: bold;
}
#pseudo{
	height: 20px;
	width: 200px;
	margin-left: 10%;
}
#message{
	height: 50px;
	width: 200px;
	margin-left: 10%;
}
#chat_submit{
	width: 150px;
	/*display: block;*/
	margin: 10px;
	margin-left: 25%;
	box-shadow: 1px 1px 1px #D83F3D;
	cursor: pointer;
}
#message, #pseudo{
	padding: 3px;
	border: 2px solid #F5C5C5;
	border-radius: 5px;
	box-shadow: 2px 2px 2px #C0C0C0 inset;
}
#message_chat{
}
#show_mess{
	background-color: #80bfff;
	overflow: scroll;
	overflow-x: hidden;
	height: 380px;
}
#message_chat div *{
	word-wrap: break-word;
}
/*Essaie de modification de la scroll-bar*/
/*Pour le navigateur google*/
::-webkit-scrollbar{
	width: 12px;
}
::-webkit-scrollbar-track{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
}
::-webkit-scrollbar-thumb{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}
@media all and (max-width: 1685px){
	#message, #pseudo{
		margin-left: 5%;
	}
}
";
?>
