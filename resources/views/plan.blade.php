
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>福井旅行㈱ {{$plan->title}}</title>
<meta name="keywords" content="福井旅行㈱{{$plan->sub_title}}">
<meta name="description" content="福井旅行㈱が企画･実施するおすすめの、{{$plan->title}}です。">
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="css/mystyle.css">
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<header>
<div class="header-in">
<a href="/" id="pagetop"><img src="{{ asset('img/icons/fktblogo.png') }}" alt="福井旅行・logo"></a>
<nav>
<ul>
<li><a href="/">トップ</a></li>
<!---  <li><a href="tabiinfo01.html">旅のご案内</a></li>
<li><a href="oshirase01.html">お知らせ</a></li>
<li><a href="campaign01.html">キャンペーン</a></li>
<li><a href="yakudachi01.html">お役立ち情報</a></li>
<li><a href="contact01.html">お問い合わせ</a></li> --->
<li><a href="company01.html">会社案内</a></li>
<li><a href="mailto:info@iitb.jp?subject=&amp;body=">お問い合わせ</a></li>
</ul>
</nav>
</div>
</header>
<article class="page">
<ol>
<li><a href="/">トップ</a>&nbsp;&nbsp;&gt;</li>
<li>旅のご案内</li>
</ol>
<div class="bukken-kiji" style="text-align : left;">
<h1 class="sabu-h1">{{$plan->title}}</h1>

@if(!empty($plan->sub_title))
<p>{{$plan->brief_report}}</p>
@endif

<section>
<h2>{{$plan->sub_title}}</h2>
<p>{{$plan->airline}}利用、{{$plan->departure_place}}発着、{{$plan->departure_date}}</p>
</section>

<section>
<h3>パンフレット、１面</h3>
<div align="center">
  <div align="center"><a href="{{asset($plan->getFrontImgUrl())}}" target="_blank"><img src="{{asset($plan->getFrontImgUrl())}}" alt="{{$plan->title}}" height="500"></a></div>
</div>
</section>

@if(!empty($plan->image_back))
<section>
<h3>パンフレット、２面</h3>
<div align="center"><a href="{{asset($plan->getBackImgUrl())}}" target="_blank"><img src="{{asset($plan->getBackImgUrl())}}" alt="{{$plan->title}}" height="500"></a></div>
</section>
@endif

<section>
<h3>旅行概要</h3>
<table>
<tr>
<th>出発日</th>
<td>{{$plan->departure_date_detail}}</td>
</tr>
<tr>
<th>旅行行程</th>
<td>{{$plan->itinerary}}</td>
</tr>
<tr>
<th>旅行代金</th>
<td>{{$plan->expense}}</td>
</tr>

@if(!empty($plan->airline_detail))
<tr>
<th>利用航空会社</th>
<td>{{$plan->airline_detail}}</td>
</tr>
@endif

@if(!empty($plan->hotel))
<tr>
<th>利用ホテル</th>
<td>{{$plan->hotel}}</td>
</tr>
@endif

@if(!empty($plan->departure_place_detail))
<tr>
<th>発着</th>
<td>{{$plan->departure_place_detail}}</td>
</tr>
@endif

@if(!empty($plan->guide))
<tr>
<th>添乗員</th>
<td>{{$plan->guide}}名</td>
</tr>
@endif

@if(!empty($plan->needed_customers))
<tr>
<th>最少催行人員</th>
<td>{{$plan->needed_customers}}名</td>
</tr>
@endif

@if(!empty($plan->report))
<tr>
<th>お知らせ</th>
<td>{!!nl2br($plan->report)!!}</td>
</tr>
@endif

</table>

<div align="center"><caption>ツアー番号：{{$plan->no}}</caption></div>
<div align="center"><a href="/">トップに戻る</a></div>
</section>
</div>
<!--- <aside>
<h1>福井旅行 おすすめの旅</h1>
<ul>
<li class="select"><a href="tabiinfo01_01.html">タヒチの旅<span class="bukkenmei">タヒチ ５・８間</span></a></li>
<li class="select"><a href="bukken02.html">oooooo<span class="bukkenmei">ooooo</span></a></li>
<li><a href="bukken03.html">ooooo<span class="bukkenmei">ooooo</span></a></li>
<li><a href="bukken04.html">ooooo<span class="bukkenmei">ooooo</span></a></li>
<li><a href="bukken05.html">ooooo<span class="bukkenmei">ooooo</span></a></li>
</ul>
</aside>  --->


</article>
<footer>
<small> &copy; 2024 FUKUI TRAVEL AGENCY Co.,Ltd.  All Rights Reserved.</small>
</footer>
</body>
</html>