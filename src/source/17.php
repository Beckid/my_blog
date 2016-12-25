<!DOCTYPE html>
<html>
<head>
<title>Consideration of game engines (new)</title>
</head>
<body>
<h1>Consideration of game engines (new)</h1>
<h5>Writen by cxh</h5>
<h6>Last updated at 2016-12-23 21:35:13</h6>
<p>1. Adobe Flash with ActionScript<br>
This is a traditional way for developing web games. It is supported widely by most mainstream browsers (including but not limited to, Chrome, Firefox, Edge). However, it is more suitable for “smaller” games, which does not have request for high-quality videos and audios. Due to the high-speed development of web game industry, Flash is not as popular as before.<br>
3D support: Flash 11 introduces Stage3D, based on OpenGL ES 2.0.<br>
<br><br>
2. HTML5 engines<br>
HTML5 has been quickly supported by more and more browsers. Compared to Flash, its compatibility is much better. Also, the consumption of system resources has been reduced. The general trend is that HTML5 is going to replace Flash gradually in the marketspace.<br>
3D support: WebGL<br>
<br><br>
3. Unreal 3/4<br>
Unreal engines have been well-known for its products due to high-quality videos and audios. However, too high quality in graphics and sounds may not be appropriate for web-based games due to long loading time and pressure on the server. Nevertheless, it is attractive not only due to the perfect quality in graphics but it is free and open-source as well. <br>
3D support: WebGL<br>
<br><br>
3. Unity 3D<br>
Unity is a powerful game engine with huge success. It supports a lot of platforms, including Windows, OSX, Linux, Wii U, Xbox360, Android, iOS, Windows Phone and web browsers. In addition, just a few weeks ago, Unity Technology has announced their plan of “Free Unity for Education!”. More details can be seen at http://unity3d.com/freeforedu. Unity has well-maintained documentation and online tutorials.<br>
More excitingly, its asset store provides a bunch of well-designed plugin-ins, models, textures, sounds and special effects. In Unity Asset Store, some of the materials are quite useful for the Source Academy, including<br>
1) Space Station: Store	Video1		Video2<br>
2) Moon: Store<br>
They save a lot of time for development and can improve the quality of graphs and sounds used by the Source Academy a lot.<br>
3D support: WebGL<br>
Language Support: C#, UnityScript (based on JavaScript), BOO (inspired by Python and based on .NET Framework)<br>
About web-based support: Before Unity 5.3, a Unity game is built and run on the browser by Unity Web Player (a useful plugin for browsers). However, both Chrome and Firefox has removed NPAPI due to security issues, therefore, Unity Web Player is also no longer support.<br>
From Unity 5.4 onwards, Unity naturally supports WebGL. Since browsers do not need any plugins to run Unity games, it becomes a better choice for mobile platforms. WebGL in Unity is implemented thanks to the help of IL2CPP, Emscripten and asm.js. Google and Mozilla have indicated their great interest in this technology.<br>
	</p>
</body>
</html><?php
require_once '../view/common/footer.php';
?>