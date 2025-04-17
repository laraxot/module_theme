@php
	Theme::add(str_replace('.','/',$comp_view)."/../bc/awesomplete/awesomplete.css");
	Theme::add(str_replace('.','/',$comp_view)."/../bc/awesomplete/awesomplete.js");

@endphp

<input class="awesomplete" data-list="#mylist" />
<ul id="mylist">
	<li>Ada</li>
	<li>Java</li>
	<li>JavaScript</li>
	<li>Brainfuck</li>
	<li>LOLCODE</li>
	<li>Node.js</li>
	<li>Ruby on Rails</li>
</ul>