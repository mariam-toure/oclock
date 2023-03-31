

<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="x-UA-comptable" content="IE=edge">
      <meta name="viemport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="index.css">
      <script defer scr="script.js"></script>
      <title>Index</title>
   </head>
      
      <script type="text/javascript"> 
         function refresh(){
             var t = 1000; // rafraîchissement en millisecondes
             setTimeout('showDate()',t)
         }
          
         function showDate() {
             var date = new Date()
             var h = date.getHours();
             var m = date.getMinutes();
             var s = date.getSeconds();
             if( h < 10 ){ h = '0' + h; }
             if( m < 10 ){ m = '0' + m; }
             if( s < 10 ){ s = '0' + s; }
             var time = h + ':' + m + ':' + s
             document.getElementById('horloge').innerHTML = time;
             refresh();
          }
      </script>
   
   <body onload=showDate();>
	<br><br>
      <span id='horloge' style="background-color:#1C1C1C;color:silver;font-size:50px;"></span>
      
      <br> <br>

      
 
    <br><br>
					
					<!-- >>>> main -->
					<form  class="myform">
						<h2>CHRONOMETRE</h2>
					<div id="main" class="d-flex flex-wrap align-items-start justify-content-center p-0">
						<section class="watch row d-flex col-12 align-items-end">
							<h2 id="minute" class="col-4">00&nbsp;:</h2>
							<h2 id="second" class="col-4">00:&nbsp;</h2>
							<h2 id="millisecond" class="col-4">00</h2>
						</section>
						<div id="buttons" class="row col-12">
							<span id="start" class="btn col-3 d-flex justify-content-center align-items-center" onclick="_start(this)" data-="off">Start</span>
							<span id="pause" class="btn col-3 d-flex justify-content-center align-items-center" onclick="_pause(this)">Pause</span>
							<span id="reset" class="btn col-3 d-flex justify-content-center align-items-center" onclick="_reset(this)">Reset</span>
							<span id="lap" class="btn col-3 d-flex justify-content-center align-items-center" onclick="_lap()">Lap</span>
						</div>
						
			        </div>
		            
		            </form>
        <script>
        setInterval(_h, 1000)

function _h() {
    let _hours = new Date().getHours()
    let _minute = new Date().getMinutes()
    let clockClass = document.getElementsByClassName('clock')[0]
    if (_hours >= 12) {
        if (_minute <= 9) {
            clockClass.innerHTML = _hours + ':' + '0' + _minute + '&nbsp;' + 'PM'
        } else {
            clockClass.innerHTML = _hours + ':' + _minute + '&nbsp;' + 'PM'
        }

    } else {
        if (_minute <= 9) {
            clockClass.innerHTML = _hours + ':' + '0' + _minute + '&nbsp;' + 'AM'
        } else {
            clockClass.innerHTML = _hours + ':' + _minute + '&nbsp;' + 'AM'
        }
    }
}

// >>>> Stopwatch

let ms = 0

let s = 0

let m = 0

let _interval

let _millisecond = document.getElementById('millisecond')
let _second = document.getElementById('second')
let _minute = document.getElementById('minute')

let _lapList = document.getElementsByClassName('lap-list')[0]

function _start(self) {
    if (self.getAttribute('data-') == 'off') {
        _interval = setInterval(_stopwatch, 10)
        self.setAttribute('data-', 'on')
    }
}


function _pause(self) {
    self.previousElementSibling.setAttribute('data-', 'off')
    clearInterval(_interval)
}

function _reset(self) {
    self.previousElementSibling.previousElementSibling.setAttribute('data-', 'off')
    ms = 0
    s = 0
    m = 0
    _millisecond.innerHTML = "0" + ms
    _second.innerHTML = "0" + s + ":"
    _minute.innerHTML = "0" + m + ":"
    _lapList.innerHTML = ''
    clearInterval(_interval)
    i = 1
}

i = 1
function _lap() {
    let _p = document.createElement('p')
    _p.innerHTML = i+"." + "&nbsp;" + "&nbsp;" + "&nbsp;" + _minute.textContent + "&nbsp;" + "&nbsp;" + _second.textContent + "&nbsp;" + "&nbsp;" + _millisecond.textContent +
        "&nbsp;"
    _p.style.color = 'white'
    _p.style.fontSize = '13px'
    _lapList.appendChild(_p)
    i++
}

function _stopwatch() {
    ms++
    if (ms > 99) {
        ms = 0
        s++
        if (s > 59) {
            s = 0
            m++
            if (m <= 9) {
                _minute.innerHTML = "0" + m + ':'
            } else {
                _minute.innerHTML = m + ':'
            }
        }
        if (s <= 9) {
            _second.innerHTML = "0" + s + ':'
        } else {
            _second.innerHTML = s + ':'
        }
    }
    if (ms <= 9) {
        _millisecond.innerHTML = "0" + ms
    } else {
        _millisecond.innerHTML = ms
    }
}
</script>
        
  
        <br>

<table align=center width=45%>
	<tr>
		<td>
			<body onload=dis()>
			<div class=main>


			<br><br><br>
				<div class=name>
				<br><br><br><br><br>
					<h2 align="right">ALARM CLOCK</h2>
				</div>
				
				<hr>
				
				<div class=headding>
					<div class=lefth>
						<h2 align="right">HOURS</h2>
					</div>
					<div class=centerh>
						<h2 align="right">MINUTES</h2>
					</div>
					<div class=righth>
						<h2 align="right">SECONDS</h2>
					</div>
				</div>
				<input type=hidden id=d2 name=d2>
				<div class=clock>
					<div class="rightc" >
						
						<input type=text readonly id=hour name=hour size=1 class=time> 
					</div>
					<div class="centerc">
						
						<input type=text readonly id=min name=min size=1 class=time> 
					</div>
					<div class="leftc">
						<input type=text readonly id=sec name=sec size=1 class=time>
					</div>
				</div>
				
				
				
				<div class=setalarm>
					<hr>
					<h2 align="right">SET ALARM</h2>
				</div>
				<hr>
				
				<div class=clock>
					<div class="leftc" >
						<select id=hour2 name=hour2 onChange="setv()">
							<option value=00>00</option>
							<option value=01>01</option>
							<option value=02>02</option>
							<option value=03>03</option>
							<option value=04>04</option>
							<option value=05>05</option>
							<option value=06>06</option>
							<option value=07>07</option>
							<option value=08>08</option>
							<option value=09>09</option>
							<option value=10>10</option>
							<option value=11>11</option>
							<option value=12>12</option>
							<option value=13>13</option>
							<option value=14>14</option>
							<option value=15>15</option>
							<option value=16>16</option>
							<option value=17>17</option>
							<option value=18>18</option>
							<option value=19>19</option>
							<option value=20>20</option>
							<option value=21>21</option>
							<option value=22>22</option>
							<option value=23>23</option>
							<option value=24>24</option>
							<script type='text/javascript'>prtsel(25);</script>
						</select>
					</div>
					<div class="centerc">
						<select id=min2 name=min2 onChange="setv()">
							<option value=00>00</option>
							<option value=01>01</option>
							<option value=02>02</option>
							<option value=03>03</option>
							<option value=04>04</option>
							<option value=05>05</option>
							<option value=06>06</option>
							<option value=07>07</option>
							<option value=08>08</option>
							<option value=09>09</option>
							<option value=10>10</option>
							<option value=11>11</option>
							<option value=12>12</option>
							<option value=13>13</option>
							<option value=14>14</option>
							<option value=15>15</option>
							<option value=16>16</option>
							<option value=17>17</option>
							<option value=18>18</option>
							<option value=19>19</option>
							<option value=20>20</option>
							<option value=21>21</option>
							<option value=22>22</option>
							<option value=23>23</option>
							<option value=24>24</option>
							<option value=25>25</option>
							<option value=26>26</option>
							<option value=27>27</option>
							<option value=28>28</option>
							<option value=29>29</option>
							<option value=30>30</option>
							<option value=31>31</option>
							<option value=32>32</option>
							<option value=33>33</option>
							<option value=34>34</option>
							<option value=35>35</option>
							<option value=36>36</option>
							<option value=37>37</option>
							<option value=38>38</option>
							<option value=39>39</option>
							<option value=40>40</option>
							<option value=41>41</option>
							<option value=42>42</option>
							<option value=43>43</option>
							<option value=44>44</option>
							<option value=45>45</option>
							<option value=46>46</option>
							<option value=47>47</option>
							<option value=48>48</option>
							<option value=49>49</option>
							<option value=50>50</option>
							<option value=51>51</option>
							<option value=52>52</option>
							<option value=53>53</option>
							<option value=54>54</option>
							<option value=55>55</option>
							<option value=56>56</option>
							<option value=57>57</option>
							<option value=58>58</option>
							<option value=59>59</option>
							<option value=60>60</option>
							<!---<script type='text/javascript'>prtsel(61);</script>--->
						</select>
					</div>
					<div class="rightc">
						<select id=sec2 name=sec2 onChange="setv()">
							<option value=00>00</option>
							<option value=01>01</option>
							<option value=02>02</option>
							<option value=03>03</option>
							<option value=04>04</option>
							<option value=05>05</option>
							<option value=06>06</option>
							<option value=07>07</option>
							<option value=08>08</option>
							<option value=09>09</option>
							<option value=10>10</option>
							<option value=11>11</option>
							<option value=12>12</option>
							<option value=13>13</option>
							<option value=14>14</option>
							<option value=15>15</option>
							<option value=16>16</option>
							<option value=17>17</option>
							<option value=18>18</option>
							<option value=19>19</option>
							<option value=20>20</option>
							<option value=21>21</option>
							<option value=22>22</option>
							<option value=23>23</option>
							<option value=24>24</option>
							<option value=25>25</option>
							<option value=26>26</option>
							<option value=27>27</option>
							<option value=28>28</option>
							<option value=29>29</option>
							<option value=30>30</option>
							<option value=31>31</option>
							<option value=32>32</option>
							<option value=33>33</option>
							<option value=34>34</option>
							<option value=35>35</option>
							<option value=36>36</option>
							<option value=37>37</option>
							<option value=38>38</option>
							<option value=39>39</option>
							<option value=40>40</option>
							<option value=41>41</option>
							<option value=42>42</option>
							<option value=43>43</option>
							<option value=44>44</option>
							<option value=45>45</option>
							<option value=46>46</option>
							<option value=47>47</option>
							<option value=48>48</option>
							<option value=49>49</option>
							<option value=50>50</option>
							<option value=51>51</option>
							<option value=52>52</option>
							<option value=53>53</option>
							<option value=54>54</option>
							<option value=55>55</option>
							<option value=56>56</option>
							<option value=57>57</option>
							<option value=58>58</option>
							<option value=59>59</option>
							<option value=60>60</option>
							<!---<script type='text/javascript'>prtsel(61);</script>--->
						</select>
					</div>
				</div>
				<audio id=alm src="http://www.orangefreesounds.com/wp-content/uploads/2015/04/Loud-alarm-clock-sound.mp3" loop controls preload="auto">
					Your browser does not support the audio element.
				</audio>
				<script type='text/javascript'>document.getElementById('alm').style.visibility="hidden";</script>
				<div id=msg>
					Alarm OFF
				</div>
				<div>
					<center>
						<input type=button id=sb name=sb value="STOP" onclick="salm()">
					</center>
					<center>
						<input type=button id=db name=db value="DISMISS" onclick="dalm()">
					</center>
				</div>
				<script type='text/javascript'>document.getElementById('sb').style.visibility="hidden";</script>
				<script type='text/javascript'>document.getElementById('db').style.visibility="hidden";</script>
			</div>
			</body>
		</td>
	</tr>
</table>
<script>
var set=0;
	
	function setv()
	{
		salm();
		var hr2= document.getElementById('hour2').value;
		var min2= document.getElementById('min2').value;
		var sec2= document.getElementById('sec2').value;
		if(hr2<10)
			hr2='0'+hr2;
		if(min2<10)
			min2='0'+min2;
		if(sec2<10)
			sec2='0'+sec2;
		document.getElementById('d2').value=hr2+'*'+min2+'*'+sec2;
		set=1;
		document.getElementById('msg').innerHTML='Alarm ON';
		document.getElementById('db').style.visibility="visible";
		document.getElementById('alm').style.visibility="hidden";
	}
	function dis()
	{
		var dat= new Date();
		var hr=dat.getHours();
		var min=dat.getMinutes();
		var sec=dat.getSeconds();
		if(hr<10)
			hr='0'+hr;
		if(min<10)
			min='0'+min;
		if(sec<10)
			sec='0'+sec;
		document.getElementById('hour').value=hr;
		document.getElementById('min').value=min;
		document.getElementById('sec').value=sec;
		var dat2v=document.getElementById('d2').value;
		var dats =hr+'*'+min+'*'+sec;
		if(dat2v==dats && set)
			{
				
				document.getElementById('alm').play();
				document.getElementById('sb').style.visibility="visible";
				//alert("Wake Up Man!");
				set=0;
				document.getElementById('db').style.visibility="hidden";
				document.getElementById('msg').innerHTML='Alarm RINGING';
			}
		setTimeout("dis()",500);
	}
	/*function prtsel(x)
	{
		for(var i=0;i<x;i++)
		{
			if(i<10)
			{
				document.write("<option value="+i+">"+0+i+"</option>");
			}
			else 
			{
				document.write("<option value="+i+">"+i+"</option>");
			}
		}
	}*/
	function salm()
	{
		document.getElementById('alm').pause();
		document.getElementById('sb').style.visibility="hidden";
		document.getElementById('msg').innerHTML='Alarm OFF';
	}
	function dalm()
	{
		set=0;
		document.getElementById('db').style.visibility="hidden";
		document.getElementById('msg').innerHTML='Alarm is OFF';
	}
    </script>

     

	
   </body>
</html>