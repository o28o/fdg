<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');
//echo basename($_SERVER['REQUEST_URI']);
$mainpage = '/ru';
$readerPage =  '/r';
?>
<html lang="<?php echo $htmllang;?>">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/extrastyles.css" rel="stylesheet" />
<!-- Favicon-->
<link rel="icon" type="image/png" href="/assets/img/favico-noglass.png" />

 <!-- Загрузка иконки для iOS -->
 <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favico-noglass.png">
 <title>Saṁyutta Nikāya</title>
</head>

<body>
<div class="container">
 <div class="my-3">
 <button class="btn btn-primary btn-sm btn-fixed-width toggle-button" type="button" id="collapseAll">+</button>
 </div>
<div class="my-3">
 <div class="level1">
 <h2><a href=# data-bs-toggle="collapse"
 data-bs-target="#snCollapse">Saṁyutta Nikāya</a></h2>
 </div>
	 <div class="collapse show showkeep" id="snCollapse">
<div class="level2">
 <h3>Sagāthāvaggasaṁyuttapāḷi</h3>
</div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn1Collapse">1. Devatāsaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn1Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Naḷavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.1">sn1.1</a> Oghataraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.2">sn1.2</a> Nimokkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.3">sn1.3</a> Upanīyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.4">sn1.4</a> Accentisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.5">sn1.5</a> Katichindasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.6">sn1.6</a> Jāgarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.7">sn1.7</a> Appaṭividitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.8">sn1.8</a> Susammuṭṭhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.9">sn1.9</a> Mānakāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.10">sn1.10</a> Araññasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Nandanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.11">sn1.11</a> Nandanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.12">sn1.12</a> Nandatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.13">sn1.13</a> Natthiputtasamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.14">sn1.14</a> Khattiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.15">sn1.15</a> Saṇamānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.16">sn1.16</a> Niddātandīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.17">sn1.17</a> Dukkarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.18">sn1.18</a> Hirīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.19">sn1.19</a> Kuṭikāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.20">sn1.20</a> Samiddhisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Sattivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.21">sn1.21</a> Sattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.22">sn1.22</a> Phusatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.23">sn1.23</a> Jaṭāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.24">sn1.24</a> Manonivāraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.25">sn1.25</a> Arahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.26">sn1.26</a> Pajjotasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.27">sn1.27</a> Sarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.28">sn1.28</a> Mahaddhanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.29">sn1.29</a> Catucakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.30">sn1.30</a> Eṇijaṅghasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Satullapakāyikavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.31">sn1.31</a> Sabbhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.32">sn1.32</a> Maccharisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.33">sn1.33</a> Sādhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.34">sn1.34</a> Nasantisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.35">sn1.35</a> Ujjhānasaññisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.36">sn1.36</a> Saddhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.37">sn1.37</a> Samayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.38">sn1.38</a> Sakalikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.39">sn1.39</a> Paṭhamapajjunnadhītusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.40">sn1.40</a> Dutiyapajjunnadhītusuttaṁ</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Ādittavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.41">sn1.41</a> Ādittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.42">sn1.42</a> Kiṁdadasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.43">sn1.43</a> Annasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.44">sn1.44</a> Ekamūlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.45">sn1.45</a> Anomasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.46">sn1.46</a> Accharāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.47">sn1.47</a> Vanaropasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.48">sn1.48</a> Jetavanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.49">sn1.49</a> Maccharisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.50">sn1.50</a> Ghaṭīkārasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Jarāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.51">sn1.51</a> Jarāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.52">sn1.52</a> Ajarasāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.53">sn1.53</a> Mittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.54">sn1.54</a> Vatthusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.55">sn1.55</a> Paṭhamajanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.56">sn1.56</a> Dutiyajanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.57">sn1.57</a> Tatiyajanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.58">sn1.58</a> Uppathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.59">sn1.59</a> Dutiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.60">sn1.60</a> Kavisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Addhavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.61">sn1.61</a> Nāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.62">sn1.62</a> Cittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.63">sn1.63</a> Taṇhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.64">sn1.64</a> Saṁyojanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.65">sn1.65</a> Bandhanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.66">sn1.66</a> Attahatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.67">sn1.67</a> Uḍḍitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.68">sn1.68</a> Pihitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.69">sn1.69</a> Icchāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.70">sn1.70</a> Lokasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Chetvāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.71">sn1.71</a> Chetvāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.72">sn1.72</a> Rathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.73">sn1.73</a> Vittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.74">sn1.74</a> Vuṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.75">sn1.75</a> Bhītāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.76">sn1.76</a> Najīratisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.77">sn1.77</a> Issariyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.78">sn1.78</a> Kāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.79">sn1.79</a> Pātheyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.80">sn1.80</a> Pajjotasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn1.81">sn1.81</a> Araṇasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn2Collapse">2. Devaputtasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn2Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.1">sn2.1</a> Paṭhamakassapasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.2">sn2.2</a> Dutiyakassapasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.3">sn2.3</a> Māghasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.4">sn2.4</a> Māgadhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.5">sn2.5</a> Dāmalisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.6">sn2.6</a> Kāmadasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.7">sn2.7</a> Pañcālacaṇḍasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.8">sn2.8</a> Tāyanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.9">sn2.9</a> Candimasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.10">sn2.10</a> Sūriyasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Anāthapiṇḍikavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.11">sn2.11</a> Candimasasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.12">sn2.12</a> Veṇḍusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.13">sn2.13</a> Dīghalaṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.14">sn2.14</a> Nandanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.15">sn2.15</a> Candanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.16">sn2.16</a> Vāsudattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.17">sn2.17</a> Subrahmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.18">sn2.18</a> Kakudhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.19">sn2.19</a> Uttarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.20">sn2.20</a> Anāthapiṇḍikasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Nānātitthiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.21">sn2.21</a> Sivasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.22">sn2.22</a> Khemasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.23">sn2.23</a> Serīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.24">sn2.24</a> Ghaṭīkārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.25">sn2.25</a> Jantusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.26">sn2.26</a> Rohitassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.27">sn2.27</a> Nandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.28">sn2.28</a> Nandivisālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.29">sn2.29</a> Susimasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn2.30">sn2.30</a> Nānātitthiyasāvakasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn3Collapse">3. Kosalasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn3Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.1">sn3.1</a> Daharasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.2">sn3.2</a> Purisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.3">sn3.3</a> Jarāmaraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.4">sn3.4</a> Piyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.5">sn3.5</a> Attarakkhitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.6">sn3.6</a> Appakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.7">sn3.7</a> Aḍḍakaraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.8">sn3.8</a> Mallikāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.9">sn3.9</a> Yaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.10">sn3.10</a> Bandhanasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.11">sn3.11</a> Sattajaṭilasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.12">sn3.12</a> Pañcarājasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.13">sn3.13</a> Doṇapākasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.14">sn3.14</a> Paṭhamasaṅgāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.15">sn3.15</a> Dutiyasaṅgāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.16">sn3.16</a> Mallikāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.17">sn3.17</a> Appamādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.18">sn3.18</a> Kalyāṇamittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.19">sn3.19</a> Paṭhamaaputtakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.20">sn3.20</a> Dutiyaaputtakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Tatiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.21">sn3.21</a> Puggalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.22">sn3.22</a> Ayyikāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.23">sn3.23</a> Lokasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.24">sn3.24</a> Issattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn3.25">sn3.25</a> Pabbatūpamasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn4Collapse">4. Mārasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn4Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.1">sn4.1</a> Tapokammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.2">sn4.2</a> Hatthirājavaṇṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.3">sn4.3</a> Subhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.4">sn4.4</a> Paṭhamamārapāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.5">sn4.5</a> Dutiyamārapāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.6">sn4.6</a> Sappasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.7">sn4.7</a> Supatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.8">sn4.8</a> Nandatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.9">sn4.9</a> Paṭhamaāyusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.10">sn4.10</a> Dutiyaāyusutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.11">sn4.11</a> Pāsāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.12">sn4.12</a> Kinnusīhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.13">sn4.13</a> Sakalikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.14">sn4.14</a> Patirūpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.15">sn4.15</a> Mānasasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.16">sn4.16</a> Pattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.17">sn4.17</a> Chaphassāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.18">sn4.18</a> Piṇḍasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.19">sn4.19</a> Kassakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.20">sn4.20</a> Rajjasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Tatiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.21">sn4.21</a> Sambahulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.22">sn4.22</a> Samiddhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.23">sn4.23</a> Godhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.24">sn4.24</a> Sattavassānubandhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn4.25">sn4.25</a> Māradhītusutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn5Collapse">5. Bhikkhunīsaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn5Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Bhikkhunīvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.1">sn5.1</a> Āḷavikāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.2">sn5.2</a> Somāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.3">sn5.3</a> Kisāgotamīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.4">sn5.4</a> Vijayāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.5">sn5.5</a> Uppalavaṇṇāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.6">sn5.6</a> Cālāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.7">sn5.7</a> Upacālāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.8">sn5.8</a> Sīsupacālāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.9">sn5.9</a> Selāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn5.10">sn5.10</a> Vajirāsutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn6Collapse">6. Brahmasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn6Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.1">sn6.1</a> Brahmāyācanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.2">sn6.2</a> Gāravasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.3">sn6.3</a> Brahmadevasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.4">sn6.4</a> Bakabrahmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.5">sn6.5</a> Aññatarabrahmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.6">sn6.6</a> Brahmalokasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.7">sn6.7</a> Kokālikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.8">sn6.8</a> Katamodakatissasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.9">sn6.9</a> Turūbrahmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.10">sn6.10</a> Kokālikasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.11">sn6.11</a> Sanaṅkumārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.12">sn6.12</a> Devadattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.13">sn6.13</a> Andhakavindasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.14">sn6.14</a> Aruṇavatīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn6.15">sn6.15</a> Parinibbānasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn7Collapse">7. Brāhmaṇasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn7Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Arahantavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.1">sn7.1</a> Dhanañjānīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.2">sn7.2</a> Akkosasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.3">sn7.3</a> Asurindakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.4">sn7.4</a> Bilaṅgikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.5">sn7.5</a> Ahiṁsakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.6">sn7.6</a> Jaṭāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.7">sn7.7</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.8">sn7.8</a> Aggikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.9">sn7.9</a> Sundarikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.10">sn7.10</a> Bahudhītarasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Upāsakavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.11">sn7.11</a> Kasibhāradvājasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.12">sn7.12</a> Udayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.13">sn7.13</a> Devahitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.14">sn7.14</a> Mahāsālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.15">sn7.15</a> Mānatthaddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.16">sn7.16</a> Paccanīkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.17">sn7.17</a> Navakammikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.18">sn7.18</a> Kaṭṭhahārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.19">sn7.19</a> Mātuposakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.20">sn7.20</a> Bhikkhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.21">sn7.21</a> Saṅgāravasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn7.22">sn7.22</a> Khomadussasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn8Collapse">8. Vaṅgīsasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn8Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Vaṅgīsavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.1">sn8.1</a> Nikkhantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.2">sn8.2</a> Aratīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.3">sn8.3</a> Pesalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.4">sn8.4</a> Ānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.5">sn8.5</a> Subhāsitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.6">sn8.6</a> Sāriputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.7">sn8.7</a> Pavāraṇāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.8">sn8.8</a> Parosahassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.9">sn8.9</a> Koṇḍaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.10">sn8.10</a> Moggallānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.11">sn8.11</a> Gaggarāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn8.12">sn8.12</a> Vaṅgīsasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn9Collapse">9. Vanasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn9Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Vanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.1">sn9.1</a> Vivekasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.2">sn9.2</a> Upaṭṭhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.3">sn9.3</a> Kassapagottasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.4">sn9.4</a> Sambahulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.5">sn9.5</a> Ānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.6">sn9.6</a> Anuruddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.7">sn9.7</a> Nāgadattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.8">sn9.8</a> Kulagharaṇīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.9">sn9.9</a> Vajjiputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.10">sn9.10</a> Sajjhāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.11">sn9.11</a> Akusalavitakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.12">sn9.12</a> Majjhanhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.13">sn9.13</a> Pākatindriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn9.14">sn9.14</a> Gandhatthenasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn10Collapse">10. Yakkhasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn10Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Indakavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.1">sn10.1</a> Indakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.2">sn10.2</a> Sakkanāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.3">sn10.3</a> Sūcilomasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.4">sn10.4</a> Maṇibhaddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.5">sn10.5</a> Sānusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.6">sn10.6</a> Piyaṅkarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.7">sn10.7</a> Punabbasusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.8">sn10.8</a> Sudattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.9">sn10.9</a> Paṭhamasukkāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.10">sn10.10</a> Dutiyasukkāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.11">sn10.11</a> Cīrāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn10.12">sn10.12</a> Āḷavakasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn11Collapse">11. Sakkasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn11Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.1">sn11.1</a> Suvīrasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.2">sn11.2</a> Susīmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.3">sn11.3</a> Dhajaggasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.4">sn11.4</a> Vepacittisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.5">sn11.5</a> Subhāsitajayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.6">sn11.6</a> Kulāvakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.7">sn11.7</a> Nadubbhiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.8">sn11.8</a> Verocanaasurindasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.9">sn11.9</a> Araññāyatanaisisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.10">sn11.10</a> Samuddakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.11">sn11.11</a> Vatapadasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.12">sn11.12</a> Sakkanāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.13">sn11.13</a> Mahālisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.14">sn11.14</a> Daliddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.15">sn11.15</a> Rāmaṇeyyakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.16">sn11.16</a> Yajamānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.17">sn11.17</a> Buddhavandanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.18">sn11.18</a> Gahaṭṭhavandanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.19">sn11.19</a> Satthāravandanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.20">sn11.20</a> Saṅghavandanāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Tatiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.21">sn11.21</a> Chetvāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.22">sn11.22</a> Dubbaṇṇiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.23">sn11.23</a> Sambarimāyāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.24">sn11.24</a> Accayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn11.25">sn11.25</a> Akkodhasutta</span>
 </div>
</div>
	 </div>
<div class="level2">
 <h3>Nidānavaggasaṁyuttapāḷi</h3>
</div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn12Collapse">12. Nidānasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn12Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Buddhavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.1">sn12.1</a> Paṭiccasamuppādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.2">sn12.2</a> Vibhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.3">sn12.3</a> Paṭipadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.4">sn12.4</a> Vipassīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.5">sn12.5</a> Sikhīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.6">sn12.6</a> Vessabhūsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.7">sn12.7</a> Kakusandhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.8">sn12.8</a> Koṇāgamanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.9">sn12.9</a> Kassapasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.10">sn12.10</a> Gotamasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Āhāravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.11">sn12.11</a> Āhārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.12">sn12.12</a> Moḷiyaphaggunasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.13">sn12.13</a> Samaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.14">sn12.14</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.15">sn12.15</a> Kaccānagottasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.16">sn12.16</a> Dhammakathikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.17">sn12.17</a> Acelakassapasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.18">sn12.18</a> Timbarukasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.19">sn12.19</a> Bālapaṇḍitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.20">sn12.20</a> Paccayasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Dasabalavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.21">sn12.21</a> Dasabalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.22">sn12.22</a> Dutiyadasabalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.23">sn12.23</a> Upanisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.24">sn12.24</a> Aññatitthiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.25">sn12.25</a> Bhūmijasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.26">sn12.26</a> Upavāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.27">sn12.27</a> Paccayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.28">sn12.28</a> Bhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.29">sn12.29</a> Samaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.30">sn12.30</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Kaḷārakhattiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.31">sn12.31</a> Bhūtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.32">sn12.32</a> Kaḷārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.33">sn12.33</a> Ñāṇavatthusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.34">sn12.34</a> Dutiyañāṇavatthusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.35">sn12.35</a> Avijjāpaccayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.36">sn12.36</a> Dutiyaavijjāpaccayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.37">sn12.37</a> Natumhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.38">sn12.38</a> Cetanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.39">sn12.39</a> Dutiyacetanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.40">sn12.40</a> Tatiyacetanāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Gahapativagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.41">sn12.41</a> Pañcaverabhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.42">sn12.42</a> Dutiyapañcaverabhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.43">sn12.43</a> Dukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.44">sn12.44</a> Lokasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.45">sn12.45</a> Ñātikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.46">sn12.46</a> Aññatarabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.47">sn12.47</a> Jāṇussoṇisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.48">sn12.48</a> Lokāyatikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.49">sn12.49</a> Ariyasāvakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.50">sn12.50</a> Dutiyaariyasāvakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Dukkhavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.51">sn12.51</a> Parivīmaṁsanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.52">sn12.52</a> Upādānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.53">sn12.53</a> Saṁyojanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.54">sn12.54</a> Dutiyasaṁyojanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.55">sn12.55</a> Mahārukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.56">sn12.56</a> Dutiyamahārukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.57">sn12.57</a> Taruṇarukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.58">sn12.58</a> Nāmarūpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.59">sn12.59</a> Viññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.60">sn12.60</a> Nidānasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Mahāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.61">sn12.61</a> Assutavāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.62">sn12.62</a> Dutiyaassutavāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.63">sn12.63</a> Puttamaṁsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.64">sn12.64</a> Atthirāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.65">sn12.65</a> Nagarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.66">sn12.66</a> Sammasasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.67">sn12.67</a> Naḷakalāpīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.68">sn12.68</a> Kosambisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.69">sn12.69</a> Upayantisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.70">sn12.70</a> Susimaparibbājakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Samaṇabrāhmaṇavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.71">sn12.71</a> Jarāmaraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.72-81">sn12.72-81</a> Jātisuttādidasaka</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Antarapeyyāla</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.82">sn12.82</a> Satthusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.83-92">sn12.83-92</a> Dutiyasatthusuttādidasaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn12.93-213">sn12.93-213</a> Sikkhāsuttādipeyyālaekādasaka</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn13Collapse">13. Abhisamayasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn13Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Abhisamayavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.1">sn13.1</a> Nakhasikhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.2">sn13.2</a> Pokkharaṇīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.3">sn13.3</a> Sambhejjaudakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.4">sn13.4</a> Dutiyasambhejjaudakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.5">sn13.5</a> Pathavīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.6">sn13.6</a> Dutiyapathavīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.7">sn13.7</a> Samuddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.8">sn13.8</a> Dutiyasamuddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.9">sn13.9</a> Pabbatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.10">sn13.10</a> Dutiyapabbatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn13.11">sn13.11</a> Tatiyapabbatasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn14Collapse">14. Dhātusaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn14Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Nānattavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.1">sn14.1</a> Dhātunānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.2">sn14.2</a> Phassanānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.3">sn14.3</a> Nophassanānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.4">sn14.4</a> Vedanānānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.5">sn14.5</a> Dutiyavedanānānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.6">sn14.6</a> Bāhiradhātunānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.7">sn14.7</a> Saññānānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.8">sn14.8</a> Nopariyesanānānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.9">sn14.9</a> Bāhiraphassanānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.10">sn14.10</a> Dutiyabāhiraphassanānattasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.11">sn14.11</a> Sattadhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.12">sn14.12</a> Sanidānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.13">sn14.13</a> Giñjakāvasathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.14">sn14.14</a> Hīnādhimuttikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.15">sn14.15</a> Caṅkamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.16">sn14.16</a> Sagāthāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.17">sn14.17</a> Assaddhasaṁsandanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.18">sn14.18</a> Assaddhamūlakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.19">sn14.19</a> Ahirikamūlakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.20">sn14.20</a> Anottappamūlakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.21">sn14.21</a> Appassutamūlakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.22">sn14.22</a> Kusītamūlakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Kammapathavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.23">sn14.23</a> Asamāhitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.24">sn14.24</a> Dussīlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.25">sn14.25</a> Pañcasikkhāpadasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.26">sn14.26</a> Sattakammapathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.27">sn14.27</a> Dasakammapathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.28">sn14.28</a> Aṭṭhaṅgikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.29">sn14.29</a> Dasaṅgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Catutthavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.30">sn14.30</a> Catudhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.31">sn14.31</a> Pubbesambodhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.32">sn14.32</a> Acariṁsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.33">sn14.33</a> Nocedaṁsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.34">sn14.34</a> Ekantadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.35">sn14.35</a> Abhinandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.36">sn14.36</a> Uppādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.37">sn14.37</a> Samaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.38">sn14.38</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn14.39">sn14.39</a> Tatiyasamaṇabrāhmaṇasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn15Collapse">15. Anamataggasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn15Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.1">sn15.1</a> Tiṇakaṭṭhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.2">sn15.2</a> Pathavīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.3">sn15.3</a> Assusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.4">sn15.4</a> Khīrasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.5">sn15.5</a> Pabbatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.6">sn15.6</a> Sāsapasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.7">sn15.7</a> Sāvakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.8">sn15.8</a> Gaṅgāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.9">sn15.9</a> Daṇḍasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.10">sn15.10</a> Puggalasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.11">sn15.11</a> Duggatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.12">sn15.12</a> Sukhitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.13">sn15.13</a> Tiṁsamattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.14">sn15.14</a> Mātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.15">sn15.15</a> Pitusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.16">sn15.16</a> Bhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.17">sn15.17</a> Bhaginisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.18">sn15.18</a> Puttasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.19">sn15.19</a> Dhītusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn15.20">sn15.20</a> Vepullapabbatasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn16Collapse">16. Kassapasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn16Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Kassapavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.1">sn16.1</a> Santuṭṭhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.2">sn16.2</a> Anottappīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.3">sn16.3</a> Candūpamāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.4">sn16.4</a> Kulūpakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.5">sn16.5</a> Jiṇṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.6">sn16.6</a> Ovādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.7">sn16.7</a> Dutiyaovādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.8">sn16.8</a> Tatiyaovādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.9">sn16.9</a> Jhānābhiññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.10">sn16.10</a> Upassayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.11">sn16.11</a> Cīvarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.12">sn16.12</a> Paraṁmaraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn16.13">sn16.13</a> Saddhammappatirūpakasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn17Collapse">17. Lābhasakkārasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn17Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.1">sn17.1</a> Dāruṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.2">sn17.2</a> Baḷisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.3">sn17.3</a> Kummasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.4">sn17.4</a> Dīghalomikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.5">sn17.5</a> Mīḷhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.6">sn17.6</a> Asanisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.7">sn17.7</a> Diddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.8">sn17.8</a> Siṅgālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.9">sn17.9</a> Verambhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.10">sn17.10</a> Sagāthakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.11">sn17.11</a> Suvaṇṇapātisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.12">sn17.12</a> Rūpiyapātisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.13-20">sn17.13-20</a> Suvaṇṇanikkhasuttādiaṭṭhaka</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Tatiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.21">sn17.21</a> Mātugāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.22">sn17.22</a> Kalyāṇīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.23">sn17.23</a> Ekaputtakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.24">sn17.24</a> Ekadhītusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.25">sn17.25</a> Samaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.26">sn17.26</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.27">sn17.27</a> Tatiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.28">sn17.28</a> Chavisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.29">sn17.29</a> Rajjusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.30">sn17.30</a> Bhikkhusutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Catutthavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.31">sn17.31</a> Bhindisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.32">sn17.32</a> Kusalamūlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.33">sn17.33</a> Kusaladhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.34">sn17.34</a> Sukkadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.35">sn17.35</a> Acirapakkantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.36">sn17.36</a> Pañcarathasatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.37">sn17.37</a> Mātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn17.38-43">sn17.38-43</a> Pitusuttādichakka</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn18Collapse">18. Rāhulasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn18Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.1">sn18.1</a> Cakkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.2">sn18.2</a> Rūpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.3">sn18.3</a> Viññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.4">sn18.4</a> Samphassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.5">sn18.5</a> Vedanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.6">sn18.6</a> Saññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.7">sn18.7</a> Sañcetanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.8">sn18.8</a> Taṇhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.9">sn18.9</a> Dhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.10">sn18.10</a> Khandhasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.11">sn18.11</a> Cakkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.12-20">sn18.12-20</a> Rūpādisuttanavaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.21">sn18.21</a> Anusayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn18.22">sn18.22</a> Apagatasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn19Collapse">19. Lakkhaṇasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn19Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.1">sn19.1</a> Aṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.2">sn19.2</a> Pesisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.3">sn19.3</a> Piṇḍasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.4">sn19.4</a> Nicchavisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.5">sn19.5</a> Asilomasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.6">sn19.6</a> Sattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.7">sn19.7</a> Usulomasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.8">sn19.8</a> Sūcilomasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.9">sn19.9</a> Dutiyasūcilomasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.10">sn19.10</a> Kumbhaṇḍasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.11">sn19.11</a> Sasīsakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.12">sn19.12</a> Gūthakhādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.13">sn19.13</a> Nicchavitthisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.14">sn19.14</a> Maṅgulitthisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.15">sn19.15</a> Okilinīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.16">sn19.16</a> Asīsakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.17">sn19.17</a> Pāpabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.18">sn19.18</a> Pāpabhikkhunīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.19">sn19.19</a> Pāpasikkhamānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.20">sn19.20</a> Pāpasāmaṇerasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn19.21">sn19.21</a> Pāpasāmaṇerīsutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn20Collapse">20. Opammasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn20Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Opammavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.1">sn20.1</a> Kūṭasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.2">sn20.2</a> Nakhasikhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.3">sn20.3</a> Kulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.4">sn20.4</a> Okkhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.5">sn20.5</a> Sattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.6">sn20.6</a> Dhanuggahasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.7">sn20.7</a> Āṇisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.8">sn20.8</a> Kaliṅgarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.9">sn20.9</a> Nāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.10">sn20.10</a> Biḷārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.11">sn20.11</a> Siṅgālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn20.12">sn20.12</a> Dutiyasiṅgālasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn21Collapse">21. Bhikkhusaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn21Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Bhikkhuvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.1">sn21.1</a> Kolitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.2">sn21.2</a> Upatissasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.3">sn21.3</a> Ghaṭasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.4">sn21.4</a> Navasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.5">sn21.5</a> Sujātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.6">sn21.6</a> Lakuṇḍakabhaddiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.7">sn21.7</a> Visākhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.8">sn21.8</a> Nandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.9">sn21.9</a> Tissasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.10">sn21.10</a> Theranāmakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.11">sn21.11</a> Mahākappinasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn21.12">sn21.12</a> Sahāyakasutta</span>
 </div>
</div>
	 </div>
<div class="level2">
 <h3>Khandhavaggasaṁyuttapāḷi</h3>
</div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn22Collapse">22. Khandhasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn22Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Nakulapituvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.1">sn22.1</a> Nakulapitusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.2">sn22.2</a> Devadahasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.3">sn22.3</a> Hāliddikānisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.4">sn22.4</a> Dutiyahāliddikānisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.5">sn22.5</a> Samādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.6">sn22.6</a> Paṭisallāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.7">sn22.7</a> Upādāparitassanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.8">sn22.8</a> Dutiyaupādāparitassanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.9">sn22.9</a> Kālattayaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.10">sn22.10</a> Kālattayadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.11">sn22.11</a> Kālattayaanattasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Aniccavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.12">sn22.12</a> Aniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.13">sn22.13</a> Dukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.14">sn22.14</a> Anattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.15">sn22.15</a> Yadaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.16">sn22.16</a> Yaṁdukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.17">sn22.17</a> Yadanattāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.18">sn22.18</a> Sahetuaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.19">sn22.19</a> Sahetudukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.20">sn22.20</a> Sahetuanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.21">sn22.21</a> Ānandasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Bhāravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.22">sn22.22</a> Bhārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.23">sn22.23</a> Pariññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.24">sn22.24</a> Abhijānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.25">sn22.25</a> Chandarāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.26">sn22.26</a> Assādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.27">sn22.27</a> Dutiyaassādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.28">sn22.28</a> Tatiyaassādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.29">sn22.29</a> Abhinandanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.30">sn22.30</a> Uppādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.31">sn22.31</a> Aghamūlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.32">sn22.32</a> Pabhaṅgusutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Natumhākavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.33">sn22.33</a> Natumhākasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.34">sn22.34</a> Dutiyanatumhākasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.35">sn22.35</a> Aññatarabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.36">sn22.36</a> Dutiyaaññatarabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.37">sn22.37</a> Ānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.38">sn22.38</a> Dutiyaānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.39">sn22.39</a> Anudhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.40">sn22.40</a> Dutiyaanudhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.41">sn22.41</a> Tatiyaanudhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.42">sn22.42</a> Catutthaanudhammasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Attadīpavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.43">sn22.43</a> Attadīpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.44">sn22.44</a> Paṭipadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.45">sn22.45</a> Aniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.46">sn22.46</a> Dutiyaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.47">sn22.47</a> Samanupassanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.48">sn22.48</a> Khandhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.49">sn22.49</a> Soṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.50">sn22.50</a> Dutiyasoṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.51">sn22.51</a> Nandikkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.52">sn22.52</a> Dutiyanandikkhayasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Upayavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.53">sn22.53</a> Upayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.54">sn22.54</a> Bījasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.55">sn22.55</a> Udānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.56">sn22.56</a> Upādānaparipavattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.57">sn22.57</a> Sattaṭṭhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.58">sn22.58</a> Sammāsambuddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.59">sn22.59</a> Anattalakkhaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.60">sn22.60</a> Mahālisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.61">sn22.61</a> Ādittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.62">sn22.62</a> Niruttipathasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Arahantavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.63">sn22.63</a> Upādiyamānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.64">sn22.64</a> Maññamānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.65">sn22.65</a> Abhinandamānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.66">sn22.66</a> Aniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.67">sn22.67</a> Dukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.68">sn22.68</a> Anattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.69">sn22.69</a> Anattaniyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.70">sn22.70</a> Rajanīyasaṇṭhitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.71">sn22.71</a> Rādhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.72">sn22.72</a> Surādhasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Khajjanīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.73">sn22.73</a> Assādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.74">sn22.74</a> Samudayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.75">sn22.75</a> Dutiyasamudayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.76">sn22.76</a> Arahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.77">sn22.77</a> Dutiyaarahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.78">sn22.78</a> Sīhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.79">sn22.79</a> Khajjanīyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.80">sn22.80</a> Piṇḍolyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.81">sn22.81</a> Pālileyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.82">sn22.82</a> Puṇṇamasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Theravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.83">sn22.83</a> Ānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.84">sn22.84</a> Tissasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.85">sn22.85</a> Yamakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.86">sn22.86</a> Anurādhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.87">sn22.87</a> Vakkalisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.88">sn22.88</a> Assajisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.89">sn22.89</a> Khemakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.90">sn22.90</a> Channasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.91">sn22.91</a> Rāhulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.92">sn22.92</a> Dutiyarāhulasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>10. Pupphavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.93">sn22.93</a> Nadīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.94">sn22.94</a> Pupphasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.95">sn22.95</a> Pheṇapiṇḍūpamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.96">sn22.96</a> Gomayapiṇḍasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.97">sn22.97</a> Nakhasikhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.98">sn22.98</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.99">sn22.99</a> Gaddulabaddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.100">sn22.100</a> Dutiyagaddulabaddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.101">sn22.101</a> Vāsijaṭasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.102">sn22.102</a> Aniccasaññāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>11. Antavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.103">sn22.103</a> Antasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.104">sn22.104</a> Dukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.105">sn22.105</a> Sakkāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.106">sn22.106</a> Pariññeyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.107">sn22.107</a> Samaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.108">sn22.108</a> Dutiyasamaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.109">sn22.109</a> Sotāpannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.110">sn22.110</a> Arahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.111">sn22.111</a> Chandappahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.112">sn22.112</a> Dutiyachandappahānasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>12. Dhammakathikavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.113">sn22.113</a> Avijjāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.114">sn22.114</a> Vijjāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.115">sn22.115</a> Dhammakathikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.116">sn22.116</a> Dutiyadhammakathikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.117">sn22.117</a> Bandhanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.118">sn22.118</a> Paripucchitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.119">sn22.119</a> Dutiyaparipucchitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.120">sn22.120</a> Saṁyojaniyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.121">sn22.121</a> Upādāniyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.122">sn22.122</a> Sīlavantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.123">sn22.123</a> Sutavantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.124">sn22.124</a> Kappasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.125">sn22.125</a> Dutiyakappasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>13. Avijjāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.126">sn22.126</a> Samudayadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.127">sn22.127</a> Dutiyasamudayadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.128">sn22.128</a> Tatiyasamudayadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.129">sn22.129</a> Assādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.130">sn22.130</a> Dutiyaassādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.131">sn22.131</a> Samudayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.132">sn22.132</a> Dutiyasamudayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.133">sn22.133</a> Koṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.134">sn22.134</a> Dutiyakoṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.135">sn22.135</a> Tatiyakoṭṭhikasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>14. Kukkuḷavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.136">sn22.136</a> Kukkuḷasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.137">sn22.137</a> Aniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.138">sn22.138</a> Dutiyaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.139">sn22.139</a> Tatiyaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.140">sn22.140</a> Dukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.141">sn22.141</a> Dutiyadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.142">sn22.142</a> Tatiyadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.143">sn22.143</a> Anattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.144">sn22.144</a> Dutiyaanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.145">sn22.145</a> Tatiyaanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.146">sn22.146</a> Nibbidābahulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.147">sn22.147</a> Aniccānupassīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.148">sn22.148</a> Dukkhānupassīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.149">sn22.149</a> Anattānupassīsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>15. Diṭṭhivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.150">sn22.150</a> Ajjhattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.151">sn22.151</a> Etaṁmamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.152">sn22.152</a> Soattāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.153">sn22.153</a> Nocamesiyāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.154">sn22.154</a> Micchādiṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.155">sn22.155</a> Sakkāyadiṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.156">sn22.156</a> Attānudiṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.157">sn22.157</a> Abhinivesasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.158">sn22.158</a> Dutiyaabhinivesasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn22.159">sn22.159</a> Ānandasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn23Collapse">23. Rādhasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn23Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamamāravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.1">sn23.1</a> Mārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.2">sn23.2</a> Sattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.3">sn23.3</a> Bhavanettisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.4">sn23.4</a> Pariññeyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.5">sn23.5</a> Samaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.6">sn23.6</a> Dutiyasamaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.7">sn23.7</a> Sotāpannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.8">sn23.8</a> Arahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.9">sn23.9</a> Chandarāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.10">sn23.10</a> Dutiyachandarāgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyamāravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.11">sn23.11</a> Mārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.12">sn23.12</a> Māradhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.13">sn23.13</a> Aniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.14">sn23.14</a> Aniccadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.15">sn23.15</a> Dukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.16">sn23.16</a> Dukkhadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.17">sn23.17</a> Anattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.18">sn23.18</a> Anattadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.19">sn23.19</a> Khayadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.20">sn23.20</a> Vayadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.21">sn23.21</a> Samudayadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.22">sn23.22</a> Nirodhadhammasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Āyācanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.23-33">sn23.23-33</a> Mārādisuttaekādasaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.34">sn23.34</a> Nirodhadhammasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Upanisinnavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.35-45">sn23.35-45</a> Mārādisuttaekādasaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn23.46">sn23.46</a> Nirodhadhammasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn24Collapse">24. Diṭṭhisaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn24Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Sotāpattivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.1">sn24.1</a> Vātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.2">sn24.2</a> Etaṁmamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.3">sn24.3</a> Soattāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.4">sn24.4</a> Nocamesiyāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.5">sn24.5</a> Natthidinnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.6">sn24.6</a> Karotosutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.7">sn24.7</a> Hetusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.8">sn24.8</a> Mahādiṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.9">sn24.9</a> Sassatadiṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.10">sn24.10</a> Asassatadiṭṭhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.11">sn24.11</a> Antavāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.12">sn24.12</a> Anantavāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.13">sn24.13</a> Taṁjīvaṁtaṁsarīraṁsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.14">sn24.14</a> Aññaṁjīvaṁaññaṁsarīraṁsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.15">sn24.15</a> Hotitathāgatosutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.16">sn24.16</a> Nahotitathāgatosutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.17">sn24.17</a> Hoticanacahotitathāgatosutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.18">sn24.18</a> Nevahotinanahotitathāgatosutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyagamanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.19">sn24.19</a> Vātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.20-35">sn24.20-35</a> Etaṁmamādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.36">sn24.36</a> Nevahotinanahotisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.37">sn24.37</a> Rūpīattāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.38">sn24.38</a> Arūpīattāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.39">sn24.39</a> Rūpīcaarūpīcaattāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.40">sn24.40</a> Nevarūpīnārūpīattāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.41">sn24.41</a> Ekantasukhīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.42">sn24.42</a> Ekantadukkhīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.43">sn24.43</a> Sukhadukkhīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.44">sn24.44</a> Adukkhamasukhīsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Tatiyagamanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.45">sn24.45</a> Navātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.46-69">sn24.46-69</a> Etaṁmamādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.70">sn24.70</a> Adukkhamasukhīsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Catutthagamanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.71">sn24.71</a> Navātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.72-95">sn24.72-95</a> Etaṁmamādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn24.96">sn24.96</a> Adukkhamasukhīsutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn25Collapse">25. Okkantasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn25Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Cakkhuvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.1">sn25.1</a> Cakkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.2">sn25.2</a> Rūpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.3">sn25.3</a> Viññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.4">sn25.4</a> Samphassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.5">sn25.5</a> Samphassajasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.6">sn25.6</a> Rūpasaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.7">sn25.7</a> Rūpasañcetanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.8">sn25.8</a> Rūpataṇhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.9">sn25.9</a> Pathavīdhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn25.10">sn25.10</a> Khandhasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn26Collapse">26. Uppādasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn26Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Uppādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.1">sn26.1</a> Cakkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.2">sn26.2</a> Rūpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.3">sn26.3</a> Viññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.4">sn26.4</a> Samphassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.5">sn26.5</a> Samphassajasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.6">sn26.6</a> Saññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.7">sn26.7</a> Sañcetanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.8">sn26.8</a> Taṇhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.9">sn26.9</a> Dhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn26.10">sn26.10</a> Khandhasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn27Collapse">27. Kilesasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn27Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Kilesavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.1">sn27.1</a> Cakkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.2">sn27.2</a> Rūpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.3">sn27.3</a> Viññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.4">sn27.4</a> Samphassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.5">sn27.5</a> Samphassajasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.6">sn27.6</a> Saññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.7">sn27.7</a> Sañcetanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.8">sn27.8</a> Taṇhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.9">sn27.9</a> Dhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn27.10">sn27.10</a> Khandhasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn28Collapse">28. Sāriputtasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn28Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Sāriputtavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.1">sn28.1</a> Vivekajasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.2">sn28.2</a> Avitakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.3">sn28.3</a> Pītisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.4">sn28.4</a> Upekkhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.5">sn28.5</a> Ākāsānañcāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.6">sn28.6</a> Viññāṇañcāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.7">sn28.7</a> Ākiñcaññāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.8">sn28.8</a> Nevasaññānāsaññāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.9">sn28.9</a> Nirodhasamāpattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn28.10">sn28.10</a> Sucimukhīsutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn29Collapse">29. Nāgasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn29Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Nāgavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.1">sn29.1</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.2">sn29.2</a> Paṇītatarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.3">sn29.3</a> Uposathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.4">sn29.4</a> Dutiyauposathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.5">sn29.5</a> Tatiyauposathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.6">sn29.6</a> Catutthauposathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.7">sn29.7</a> Sutasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.8">sn29.8</a> Dutiyasutasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.9">sn29.9</a> Tatiyasutasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.10">sn29.10</a> Catutthasutasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.11-20">sn29.11-20</a> Aṇḍajadānūpakārasuttadasaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn29.21-50">sn29.21-50</a> Jalābujādidānūpakārasuttattiṁsaka</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn30Collapse">30. Supaṇṇasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn30Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Supaṇṇavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn30.1">sn30.1</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn30.2">sn30.2</a> Harantisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn30.3">sn30.3</a> Dvayakārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn30.4-6">sn30.4-6</a> Dutiyādidvayakārīsuttattika</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn30.7-16">sn30.7-16</a> Aṇḍajadānūpakārasuttadasaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn30.17-46">sn30.17-46</a> Jalābujadānūpakārasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn31Collapse">31. Gandhabbakāyasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn31Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Gandhabbavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn31.1">sn31.1</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn31.2">sn31.2</a> Sucaritasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn31.3">sn31.3</a> Mūlagandhadātāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn31.4-12">sn31.4-12</a> Sāragandhādidātāsuttanavaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn31.13-22">sn31.13-22</a> Mūlagandhadānūpakārasuttadasaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn31.23-112">sn31.23-112</a> Sāragandhādidānūpakārasuttanavutika</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn32Collapse">32. Valāhakasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn32Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Valāhakavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.1">sn32.1</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.2">sn32.2</a> Sucaritasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.3-12">sn32.3-12</a> Sītavalāhakadānūpakārasuttadasaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.13-52">sn32.13-52</a> Uṇhavalāhakadānūpakārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.53">sn32.53</a> Sītavalāhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.54">sn32.54</a> Uṇhavalāhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.55">sn32.55</a> Abbhavalāhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.56">sn32.56</a> Vātavalāhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn32.57">sn32.57</a> Vassavalāhakasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn33Collapse">33. Vacchagottasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn33Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Vacchagottavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.1">sn33.1</a> Rūpaaññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.2">sn33.2</a> Vedanāaññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.3">sn33.3</a> Saññāaññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.4">sn33.4</a> Saṅkhāraaññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.5">sn33.5</a> Viññāṇaaññāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.6-10">sn33.6-10</a> Rūpaadassanādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.11-15">sn33.11-15</a> Rūpaanabhisamayādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.16-20">sn33.16-20</a> Rūpaananubodhādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.21-25">sn33.21-25</a> Rūpaappaṭivedhādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.26-30">sn33.26-30</a> Rūpaasallakkhaṇādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.31-35">sn33.31-35</a> Rūpaanupalakkhaṇādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.36-40">sn33.36-40</a> Rūpaappaccupalakkhaṇādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.41-45">sn33.41-45</a> Rūpaasamapekkhaṇādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.46-50">sn33.46-50</a> Rūpaappaccupekkhaṇādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.51-54">sn33.51-54</a> Rūpaappaccakkhakammādisuttacatukka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn33.55">sn33.55</a> Viññāṇaappaccakkhakammasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn34Collapse">34. Jhānasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn34Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Jhānavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.1">sn34.1</a> Samādhimūlakasamāpattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.2">sn34.2</a> Samādhimūlakaṭhitisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.3">sn34.3</a> Samādhimūlakavuṭṭhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.4">sn34.4</a> Samādhimūlakakallitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.5">sn34.5</a> Samādhimūlakaārammaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.6">sn34.6</a> Samādhimūlakagocarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.7">sn34.7</a> Samādhimūlakaabhinīhārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.8">sn34.8</a> Samādhimūlakasakkaccakārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.9">sn34.9</a> Samādhimūlakasātaccakārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.10">sn34.10</a> Samādhimūlakasappāyakārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.11">sn34.11</a> Samāpattimūlakaṭhitisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.12">sn34.12</a> Samāpattimūlakavuṭṭhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.13">sn34.13</a> Samāpattimūlakakallitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.14">sn34.14</a> Samāpattimūlakaārammaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.15">sn34.15</a> Samāpattimūlakagocarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.16">sn34.16</a> Samāpattimūlakaabhinīhārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.17">sn34.17</a> Samāpattimūlakasakkaccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.18">sn34.18</a> Samāpattimūlakasātaccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.19">sn34.19</a> Samāpattimūlakasappāyakārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.20-27">sn34.20-27</a> Ṭhitimūlakavuṭṭhānasuttādiaṭṭhaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.28-34">sn34.28-34</a> Vuṭṭhānamūlakakallitasuttādisattaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.35-40">sn34.35-40</a> Kallitamūlakaārammaṇasuttādichakka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.41-45">sn34.41-45</a> Ārammaṇamūlakagocarasuttādipañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.46-49">sn34.46-49</a> Gocaramūlakaabhinīhārasuttādicatukka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.50-52">sn34.50-52</a> Abhinīhāramūlakasakkaccasuttāditika</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.53-54">sn34.53-54</a> Sakkaccamūlakasātaccakārīsuttadukādi</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn34.55">sn34.55</a> Sātaccamūlakasappāyakārīsutta</span>
 </div>
</div>
	 </div>
<div class="level2">
 <h3>Saḷāyatanavaggasaṁyuttapāḷi</h3>
</div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn35Collapse">35. Saḷāyatanasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn35Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Aniccavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.1">sn35.1</a> Ajjhattāniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.2">sn35.2</a> Ajjhattadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.3">sn35.3</a> Ajjhattānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.4">sn35.4</a> Bāhirāniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.5">sn35.5</a> Bāhiradukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.6">sn35.6</a> Bāhirānattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.7">sn35.7</a> Ajjhattāniccātītānāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.8">sn35.8</a> Ajjhattadukkhātītānāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.9">sn35.9</a> Ajjhattānattātītānāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.10">sn35.10</a> Bāhirāniccātītānāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.11">sn35.11</a> Bāhiradukkhātītānāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.12">sn35.12</a> Bāhirānattātītānāgatasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Yamakavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.13">sn35.13</a> Paṭhamapubbesambodhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.14">sn35.14</a> Dutiyapubbesambodhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.15">sn35.15</a> Paṭhamaassādapariyesanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.16">sn35.16</a> Dutiyaassādapariyesanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.17">sn35.17</a> Paṭhamanoceassādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.18">sn35.18</a> Dutiyanoceassādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.19">sn35.19</a> Paṭhamābhinandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.20">sn35.20</a> Dutiyābhinandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.21">sn35.21</a> Paṭhamadukkhuppādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.22">sn35.22</a> Dutiyadukkhuppādasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Sabbavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.23">sn35.23</a> Sabbasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.24">sn35.24</a> Pahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.25">sn35.25</a> Abhiññāpariññāpahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.26">sn35.26</a> Paṭhamaaparijānanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.27">sn35.27</a> Dutiyaaparijānanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.28">sn35.28</a> Ādittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.29">sn35.29</a> Addhabhūtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.30">sn35.30</a> Samugghātasāruppasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.31">sn35.31</a> Paṭhamasamugghātasappāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.32">sn35.32</a> Dutiyasamugghātasappāyasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Jātidhammavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.33-42">sn35.33-42</a> Jātidhammādisuttadasaka</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Sabbaaniccavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.43-51">sn35.43-51</a> Aniccādisuttanavaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.52">sn35.52</a> Upassaṭṭhasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Avijjāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.53">sn35.53</a> Avijjāpahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.54">sn35.54</a> Saṁyojanappahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.55">sn35.55</a> Saṁyojanasamugghātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.56">sn35.56</a> Āsavapahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.57">sn35.57</a> Āsavasamugghātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.58">sn35.58</a> Anusayapahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.59">sn35.59</a> Anusayasamugghātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.60">sn35.60</a> Sabbupādānapariññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.61">sn35.61</a> Paṭhamasabbupādānapariyādānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.62">sn35.62</a> Dutiyasabbupādānapariyādānasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Migajālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.63">sn35.63</a> Paṭhamamigajālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.64">sn35.64</a> Dutiyamigajālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.65">sn35.65</a> Paṭhamasamiddhimārapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.66">sn35.66</a> Samiddhisattapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.67">sn35.67</a> Samiddhidukkhapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.68">sn35.68</a> Samiddhilokapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.69">sn35.69</a> Upasenaāsīvisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.70">sn35.70</a> Upavāṇasandiṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.71">sn35.71</a> Paṭhamachaphassāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.72">sn35.72</a> Dutiyachaphassāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.73">sn35.73</a> Tatiyachaphassāyatanasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Gilānavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.74">sn35.74</a> Paṭhamagilānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.75">sn35.75</a> Dutiyagilānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.76">sn35.76</a> Rādhaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.77">sn35.77</a> Rādhadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.78">sn35.78</a> Rādhaanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.79">sn35.79</a> Paṭhamaavijjāpahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.80">sn35.80</a> Dutiyaavijjāpahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.81">sn35.81</a> Sambahulabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.82">sn35.82</a> Lokapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.83">sn35.83</a> Phaggunapañhāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Channavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.84">sn35.84</a> Palokadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.85">sn35.85</a> Suññatalokasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.86">sn35.86</a> Saṅkhittadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.87">sn35.87</a> Channasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.88">sn35.88</a> Puṇṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.89">sn35.89</a> Bāhiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.90">sn35.90</a> Paṭhamaejāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.91">sn35.91</a> Dutiyaejāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.92">sn35.92</a> Paṭhamadvayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.93">sn35.93</a> Dutiyadvayasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>10. Saḷavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.94">sn35.94</a> Adantaaguttasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.95">sn35.95</a> Mālukyaputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.96">sn35.96</a> Parihānadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.97">sn35.97</a> Pamādavihārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.98">sn35.98</a> Saṁvarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.99">sn35.99</a> Samādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.100">sn35.100</a> Paṭisallānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.101">sn35.101</a> Paṭhamanatumhākasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.102">sn35.102</a> Dutiyanatumhākasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.103">sn35.103</a> Udakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>11. Yogakkhemivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.104">sn35.104</a> Yogakkhemisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.105">sn35.105</a> Upādāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.106">sn35.106</a> Dukkhasamudayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.107">sn35.107</a> Lokasamudayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.108">sn35.108</a> Seyyohamasmisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.109">sn35.109</a> Saṁyojaniyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.110">sn35.110</a> Upādāniyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.111">sn35.111</a> Ajjhattikāyatanaparijānanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.112">sn35.112</a> Bāhirāyatanaparijānanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.113">sn35.113</a> Upassutisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>12. Lokakāmaguṇavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.114">sn35.114</a> Paṭhamamārapāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.115">sn35.115</a> Dutiyamārapāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.116">sn35.116</a> Lokantagamanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.117">sn35.117</a> Kāmaguṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.118">sn35.118</a> Sakkapañhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.119">sn35.119</a> Pañcasikhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.120">sn35.120</a> Sāriputtasaddhivihārikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.121">sn35.121</a> Rāhulovādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.122">sn35.122</a> Saṁyojaniyadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.123">sn35.123</a> Upādāniyadhammasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>13. Gahapativagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.124">sn35.124</a> Vesālīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.125">sn35.125</a> Vajjīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.126">sn35.126</a> Nāḷandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.127">sn35.127</a> Bhāradvājasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.128">sn35.128</a> Soṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.129">sn35.129</a> Ghositasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.130">sn35.130</a> Hāliddikānisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.131">sn35.131</a> Nakulapitusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.132">sn35.132</a> Lohiccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.133">sn35.133</a> Verahaccānisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>14. Devadahavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.134">sn35.134</a> Devadahasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.135">sn35.135</a> Khaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.136">sn35.136</a> Paṭhamarūpārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.137">sn35.137</a> Dutiyarūpārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.138">sn35.138</a> Paṭhamanatumhākasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.139">sn35.139</a> Dutiyanatumhākasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.140">sn35.140</a> Ajjhattaaniccahetusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.141">sn35.141</a> Ajjhattadukkhahetusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.142">sn35.142</a> Ajjhattānattahetusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.143">sn35.143</a> Bāhirāniccahetusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.144">sn35.144</a> Bāhiradukkhahetusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.145">sn35.145</a> Bāhirānattahetusutta</span>
 </div>
<div class="level4 my-3">
		 <h5>15. Navapurāṇavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.146">sn35.146</a> Kammanirodhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.147">sn35.147</a> Aniccanibbānasappāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.148">sn35.148</a> Dukkhanibbānasappāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.149">sn35.149</a> Anattanibbānasappāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.150">sn35.150</a> Nibbānasappāyapaṭipadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.151">sn35.151</a> Antevāsikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.152">sn35.152</a> Kimatthiyabrahmacariyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.153">sn35.153</a> Atthinukhopariyāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.154">sn35.154</a> Indriyasampannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.155">sn35.155</a> Dhammakathikapucchasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>16. Nandikkhayavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.156">sn35.156</a> Ajjhattanandikkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.157">sn35.157</a> Bāhiranandikkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.158">sn35.158</a> Ajjhattaaniccanandikkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.159">sn35.159</a> Bāhiraaniccanandikkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.160">sn35.160</a> Jīvakambavanasamādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.161">sn35.161</a> Jīvakambavanapaṭisallānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.162">sn35.162</a> Koṭṭhikaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.163">sn35.163</a> Koṭṭhikadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.164">sn35.164</a> Koṭṭhikaanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.165">sn35.165</a> Micchādiṭṭhipahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.166">sn35.166</a> Sakkāyadiṭṭhipahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.167">sn35.167</a> Attānudiṭṭhipahānasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>17. Saṭṭhipeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.168">sn35.168</a> Ajjhattaaniccachandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.169">sn35.169</a> Ajjhattaaniccarāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.170">sn35.170</a> Ajjhattaaniccachandarāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.171-173">sn35.171-173</a> Dukkhachandādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.174-176">sn35.174-176</a> Anattachandādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.177-179">sn35.177-179</a> Bāhirāniccachandādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.180-182">sn35.180-182</a> Bāhiradukkhachandādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.183-185">sn35.183-185</a> Bāhirānattachandādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.186">sn35.186</a> Ajjhattātītāniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.187">sn35.187</a> Ajjhattānāgatāniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.188">sn35.188</a> Ajjhattapaccuppannāniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.189-191">sn35.189-191</a> Ajjhattātītādidukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.192-194">sn35.192-194</a> Ajjhattātītādianattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.195-197">sn35.195-197</a> Bāhirātītādianiccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.198-200">sn35.198-200</a> Bāhirātītādidukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.201-203">sn35.201-203</a> Bāhirātītādianattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.204">sn35.204</a> Ajjhattātītayadaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.205">sn35.205</a> Ajjhattānāgatayadaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.206">sn35.206</a> Ajjhattapaccuppannayadaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.207-209">sn35.207-209</a> Ajjhattātītādiyaṁdukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.210-212">sn35.210-212</a> Ajjhattātītādiyadanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.213-215">sn35.213-215</a> Bāhirātītādiyadaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.216-218">sn35.216-218</a> Bāhirātītādiyaṁdukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.219-221">sn35.219-221</a> Bāhirātītādiyadanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.222">sn35.222</a> Ajjhattāyatanaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.223">sn35.223</a> Ajjhattāyatanadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.224">sn35.224</a> Ajjhattāyatanaanattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.225">sn35.225</a> Bāhirāyatanaaniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.226">sn35.226</a> Bāhirāyatanadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.227">sn35.227</a> Bāhirāyatanaanattasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>18. Samuddavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.228">sn35.228</a> Paṭhamasamuddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.229">sn35.229</a> Dutiyasamuddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.230">sn35.230</a> Bāḷisikopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.231">sn35.231</a> Khīrarukkhopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.232">sn35.232</a> Koṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.233">sn35.233</a> Kāmabhūsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.234">sn35.234</a> Udāyīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.235">sn35.235</a> Ādittapariyāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.236">sn35.236</a> Paṭhamahatthapādopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.237">sn35.237</a> Dutiyahatthapādopamasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>19. Āsīvisavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.238">sn35.238</a> Āsīvisopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.239">sn35.239</a> Rathopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.240">sn35.240</a> Kummopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.241">sn35.241</a> Paṭhamadārukkhandhopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.242">sn35.242</a> Dutiyadārukkhandhopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.243">sn35.243</a> Avassutapariyāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.244">sn35.244</a> Dukkhadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.245">sn35.245</a> Kiṁsukopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.246">sn35.246</a> Vīṇopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.247">sn35.247</a> Chappāṇakopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn35.248">sn35.248</a> Yavakalāpisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn36Collapse">36. Vedanāsaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn36Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Sagāthāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.1">sn36.1</a> Samādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.2">sn36.2</a> Sukhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.3">sn36.3</a> Pahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.4">sn36.4</a> Pātālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.5">sn36.5</a> Daṭṭhabbasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.6">sn36.6</a> Sallasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.7">sn36.7</a> Paṭhamagelaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.8">sn36.8</a> Dutiyagelaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.9">sn36.9</a> Aniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.10">sn36.10</a> Phassamūlakasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Rahogatavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.11">sn36.11</a> Rahogatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.12">sn36.12</a> Paṭhamaākāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.13">sn36.13</a> Dutiyaākāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.14">sn36.14</a> Agārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.15">sn36.15</a> Paṭhamaānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.16">sn36.16</a> Dutiyaānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.17">sn36.17</a> Paṭhamasambahulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.18">sn36.18</a> Dutiyasambahulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.19">sn36.19</a> Pañcakaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.20">sn36.20</a> Bhikkhusutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Aṭṭhasatapariyāyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.21">sn36.21</a> Sīvakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.22">sn36.22</a> Aṭṭhasatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.23">sn36.23</a> Aññatarabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.24">sn36.24</a> Pubbasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.25">sn36.25</a> Ñāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.26">sn36.26</a> Sambahulabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.27">sn36.27</a> Paṭhamasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.28">sn36.28</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.29">sn36.29</a> Tatiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.30">sn36.30</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn36.31">sn36.31</a> Nirāmisasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn37Collapse">37. Mātugāmasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn37Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.1">sn37.1</a> Mātugāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.2">sn37.2</a> Purisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.3">sn37.3</a> Āveṇikadukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.4">sn37.4</a> Tīhidhammehisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.5">sn37.5</a> Kodhanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.6">sn37.6</a> Upanāhīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.7">sn37.7</a> Issukīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.8">sn37.8</a> Maccharīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.9">sn37.9</a> Aticārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.10">sn37.10</a> Dussīlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.11">sn37.11</a> Appassutasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.12">sn37.12</a> Kusītasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.13">sn37.13</a> Muṭṭhassatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.14">sn37.14</a> Pañcaverasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.15">sn37.15</a> Akkodhanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.16">sn37.16</a> Anupanāhīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.17">sn37.17</a> Anissukīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.18">sn37.18</a> Amaccharīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.19">sn37.19</a> Anaticārīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.20">sn37.20</a> Susīlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.21">sn37.21</a> Bahussutasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.22">sn37.22</a> Āraddhavīriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.23">sn37.23</a> Upaṭṭhitassatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.24">sn37.24</a> Pañcasīlasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Balavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.25">sn37.25</a> Visāradasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.26">sn37.26</a> Pasayhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.27">sn37.27</a> Abhibhuyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.28">sn37.28</a> Ekasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.29">sn37.29</a> Aṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.30">sn37.30</a> Nāsentisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.31">sn37.31</a> Hetusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.32">sn37.32</a> Ṭhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.33">sn37.33</a> Pañcasīlavisāradasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn37.34">sn37.34</a> Vaḍḍhīsutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn38Collapse">38. Jambukhādakasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn38Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Jambukhādakavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.1">sn38.1</a> Nibbānapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.2">sn38.2</a> Arahattapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.3">sn38.3</a> Dhammavādīpañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.4">sn38.4</a> Kimatthiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.5">sn38.5</a> Assāsappattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.6">sn38.6</a> Paramassāsappattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.7">sn38.7</a> Vedanāpañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.8">sn38.8</a> Āsavapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.9">sn38.9</a> Avijjāpañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.10">sn38.10</a> Taṇhāpañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.11">sn38.11</a> Oghapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.12">sn38.12</a> Upādānapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.13">sn38.13</a> Bhavapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.14">sn38.14</a> Dukkhapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.15">sn38.15</a> Sakkāyapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn38.16">sn38.16</a> Dukkarapañhāsutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn39Collapse">39. Sāmaṇḍakasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn39Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Sāmaṇḍakavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn39.1-15">sn39.1-15</a> Sāmaṇḍakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn39.16">sn39.16</a> Dukkarasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn40Collapse">40. Moggallānasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn40Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Moggallānavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.1">sn40.1</a> Paṭhamajhānapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.2">sn40.2</a> Dutiyajhānapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.3">sn40.3</a> Tatiyajhānapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.4">sn40.4</a> Catutthajhānapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.5">sn40.5</a> Ākāsānañcāyatanapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.6">sn40.6</a> Viññāṇañcāyatanapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.7">sn40.7</a> Ākiñcaññāyatanapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.8">sn40.8</a> Nevasaññānāsaññāyatanapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.9">sn40.9</a> Animittapañhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.10">sn40.10</a> Sakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn40.11">sn40.11</a> Candanasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn41Collapse">41. Cittasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn41Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Cittavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.1">sn41.1</a> Saṁyojanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.2">sn41.2</a> Paṭhamaisidattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.3">sn41.3</a> Dutiyaisidattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.4">sn41.4</a> Mahakapāṭihāriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.5">sn41.5</a> Paṭhamakāmabhūsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.6">sn41.6</a> Dutiyakāmabhūsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.7">sn41.7</a> Godattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.8">sn41.8</a> Nigaṇṭhanāṭaputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.9">sn41.9</a> Acelakassapasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn41.10">sn41.10</a> Gilānadassanasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn42Collapse">42. Gāmaṇisaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn42Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Gāmaṇivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.1">sn42.1</a> Caṇḍasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.2">sn42.2</a> Tālapuṭasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.3">sn42.3</a> Yodhājīvasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.4">sn42.4</a> Hatthārohasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.5">sn42.5</a> Assārohasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.6">sn42.6</a> Asibandhakaputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.7">sn42.7</a> Khettūpamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.8">sn42.8</a> Saṅkhadhamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.9">sn42.9</a> Kulasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.10">sn42.10</a> Maṇicūḷakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.11">sn42.11</a> Bhadrakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.12">sn42.12</a> Rāsiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn42.13">sn42.13</a> Pāṭaliyasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn43Collapse">43. Asaṅkhatasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn43Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Paṭhamavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.1">sn43.1</a> Kāyagatāsatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.2">sn43.2</a> Samathavipassanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.3">sn43.3</a> Savitakkasavicārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.4">sn43.4</a> Suññatasamādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.5">sn43.5</a> Satipaṭṭhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.6">sn43.6</a> Sammappadhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.7">sn43.7</a> Iddhipādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.8">sn43.8</a> Indriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.9">sn43.9</a> Balasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.10">sn43.10</a> Bojjhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.11">sn43.11</a> Maggaṅgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.12">sn43.12</a> Asaṅkhatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.13">sn43.13</a> Anatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.14-43">sn43.14-43</a> Anāsavādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn43.44">sn43.44</a> Parāyanasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn44Collapse">44. Abyākatasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn44Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Abyākatavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.1">sn44.1</a> Khemāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.2">sn44.2</a> Anurādhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.3">sn44.3</a> Paṭhamasāriputtakoṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.4">sn44.4</a> Dutiyasāriputtakoṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.5">sn44.5</a> Tatiyasāriputtakoṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.6">sn44.6</a> Catutthasāriputtakoṭṭhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.7">sn44.7</a> Moggallānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.8">sn44.8</a> Vacchagottasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.9">sn44.9</a> Kutūhalasālāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.10">sn44.10</a> Ānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn44.11">sn44.11</a> Sabhiyakaccānasutta</span>
 </div>
</div>
	 </div>
<div class="level2">
 <h3>Mahāvaggasaṁyuttapāḷi</h3>
</div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn45Collapse">45. Maggasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn45Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Avijjāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.1">sn45.1</a> Avijjāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.2">sn45.2</a> Upaḍḍhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.3">sn45.3</a> Sāriputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.4">sn45.4</a> Jāṇussoṇibrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.5">sn45.5</a> Kimatthiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.6">sn45.6</a> Paṭhamaaññatarabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.7">sn45.7</a> Dutiyaaññatarabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.8">sn45.8</a> Vibhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.9">sn45.9</a> Sūkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.10">sn45.10</a> Nandiyasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Vihāravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.11">sn45.11</a> Paṭhamavihārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.12">sn45.12</a> Dutiyavihārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.13">sn45.13</a> Sekkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.14">sn45.14</a> Paṭhamauppādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.15">sn45.15</a> Dutiyauppādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.16">sn45.16</a> Paṭhamaparisuddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.17">sn45.17</a> Dutiyaparisuddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.18">sn45.18</a> Paṭhamakukkuṭārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.19">sn45.19</a> Dutiyakukkuṭārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.20">sn45.20</a> Tatiyakukkuṭārāmasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Micchattavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.21">sn45.21</a> Micchattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.22">sn45.22</a> Akusaladhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.23">sn45.23</a> Paṭhamapaṭipadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.24">sn45.24</a> Dutiyapaṭipadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.25">sn45.25</a> Paṭhamaasappurisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.26">sn45.26</a> Dutiyaasappurisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.27">sn45.27</a> Kumbhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.28">sn45.28</a> Samādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.29">sn45.29</a> Vedanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.30">sn45.30</a> Uttiyasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Paṭipattivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.31">sn45.31</a> Paṭhamapaṭipattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.32">sn45.32</a> Dutiyapaṭipattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.33">sn45.33</a> Viraddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.34">sn45.34</a> Pāraṅgamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.35">sn45.35</a> Paṭhamasāmaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.36">sn45.36</a> Dutiyasāmaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.37">sn45.37</a> Paṭhamabrahmaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.38">sn45.38</a> Dutiyabrahmaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.39">sn45.39</a> Paṭhamabrahmacariyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.40">sn45.40</a> Dutiyabrahmacariyasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Aññatitthiyapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.41">sn45.41</a> Rāgavirāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.42-47">sn45.42-47</a> Saṁyojanappahānādisuttachakka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.48">sn45.48</a> Anupādāparinibbānasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Sūriyapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.49">sn45.49</a> Kalyāṇamittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.50-54">sn45.50-54</a> Sīlasampadādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.55">sn45.55</a> Yonisomanasikārasampadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.56">sn45.56</a> Dutiyakalyāṇamittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.57-61">sn45.57-61</a> Dutiyasīlasampadādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.62">sn45.62</a> Dutiyayonisomanasikārasampadāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Ekadhammapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.63">sn45.63</a> Kalyāṇamittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.64-68">sn45.64-68</a> Sīlasampadādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.69">sn45.69</a> Yonisomanasikārasampadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.70">sn45.70</a> Dutiyakalyāṇamittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.71-75">sn45.71-75</a> Dutiyasīlasampadādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.76">sn45.76</a> Dutiyayonisomanasikārasampadāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Dutiyaekadhammapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.77">sn45.77</a> Kalyāṇamittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.78-82">sn45.78-82</a> Sīlasampadādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.83">sn45.83</a> Yonisomanasikārasampadāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.84">sn45.84</a> Dutiyakalyāṇamittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.85-89">sn45.85-89</a> Dutiyasīlasampadādisuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.90">sn45.90</a> Dutiyayonisomanasikārasampadāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.91">sn45.91</a> Paṭhamapācīnaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.92-95">sn45.92-95</a> Dutiyādipācīnaninnasuttacatukka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.96">sn45.96</a> Chaṭṭhapācīnaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.97">sn45.97</a> Paṭhamasamuddaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.98-102">sn45.98-102</a> Dutiyādisamuddaninnasuttapañcaka</span>
 </div>
<div class="level4 my-3">
		 <h5>10. Dutiyagaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.103">sn45.103</a> Paṭhamapācīnaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.104-108">sn45.104-108</a> Dutiyādipācīnaninnasuttapañcaka</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.109">sn45.109</a> Paṭhamasamuddaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.110-114">sn45.110-114</a> Dutiyādisamuddaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.115">sn45.115</a> Paṭhamapācīnaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.116-120">sn45.116-120</a> Dutiyādipācīnaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.121">sn45.121</a> Paṭhamasamuddaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.122-126">sn45.122-126</a> Dutiyādisamuddaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.127">sn45.127</a> Paṭhamapācīnaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.128-132">sn45.128-132</a> Dutiyādipācīnaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.133">sn45.133</a> Paṭhamasamuddaninnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.134-138">sn45.134-138</a> Dutiyādisamuddaninnasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>11. Appamādapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.139">sn45.139</a> Tathāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.140">sn45.140</a> Padasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.141-145">sn45.141-145</a> Kūṭādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.146-148">sn45.146-148</a> Candimādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>12. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.149">sn45.149</a> Balasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.150">sn45.150</a> Bījasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.151">sn45.151</a> Nāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.152">sn45.152</a> Rukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.153">sn45.153</a> Kumbhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.154">sn45.154</a> Sūkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.155">sn45.155</a> Ākāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.156">sn45.156</a> Paṭhamameghasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.157">sn45.157</a> Dutiyameghasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.158">sn45.158</a> Nāvāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.159">sn45.159</a> Āgantukasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.160">sn45.160</a> Nadīsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>13. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.161">sn45.161</a> Esanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.162">sn45.162</a> Vidhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.163">sn45.163</a> Āsavasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.164">sn45.164</a> Bhavasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.165">sn45.165</a> Dukkhatāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.166">sn45.166</a> Khilasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.167">sn45.167</a> Malasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.168">sn45.168</a> Nīghasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.169">sn45.169</a> Vedanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.170">sn45.170</a> Taṇhāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>14. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.171">sn45.171</a> Oghasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.172">sn45.172</a> Yogasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.173">sn45.173</a> Upādānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.174">sn45.174</a> Ganthasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.175">sn45.175</a> Anusayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.176">sn45.176</a> Kāmaguṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.177">sn45.177</a> Nīvaraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.178">sn45.178</a> Upādānakkhandhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.179">sn45.179</a> Orambhāgiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn45.180">sn45.180</a> Uddhambhāgiyasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn46Collapse">46. Bojjhaṅgasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn46Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Pabbatavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.1">sn46.1</a> Himavantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.2">sn46.2</a> Kāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.3">sn46.3</a> Sīlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.4">sn46.4</a> Vatthasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.5">sn46.5</a> Bhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.6">sn46.6</a> Kuṇḍaliyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.7">sn46.7</a> Kūṭāgārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.8">sn46.8</a> Upavānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.9">sn46.9</a> Paṭhamauppannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.10">sn46.10</a> Dutiyauppannasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Gilānavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.11">sn46.11</a> Pāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.12">sn46.12</a> Paṭhamasūriyūpamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.13">sn46.13</a> Dutiyasūriyūpamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.14">sn46.14</a> Paṭhamagilānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.15">sn46.15</a> Dutiyagilānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.16">sn46.16</a> Tatiyagilānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.17">sn46.17</a> Pāraṅgamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.18">sn46.18</a> Viraddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.19">sn46.19</a> Ariyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.20">sn46.20</a> Nibbidāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Udāyivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.21">sn46.21</a> Bodhāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.22">sn46.22</a> Bojjhaṅgadesanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.23">sn46.23</a> Ṭhāniyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.24">sn46.24</a> Ayonisomanasikārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.25">sn46.25</a> Aparihāniyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.26">sn46.26</a> Taṇhakkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.27">sn46.27</a> Taṇhānirodhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.28">sn46.28</a> Nibbedhabhāgiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.29">sn46.29</a> Ekadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.30">sn46.30</a> Udāyisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Nīvaraṇavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.31">sn46.31</a> Paṭhamakusalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.32">sn46.32</a> Dutiyakusalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.33">sn46.33</a> Upakkilesasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.34">sn46.34</a> Anupakkilesasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.35">sn46.35</a> Ayonisomanasikārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.36">sn46.36</a> Buddhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.37">sn46.37</a> Āvaraṇanīvaraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.38">sn46.38</a> Anīvaraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.39">sn46.39</a> Rukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.40">sn46.40</a> Nīvaraṇasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Cakkavattivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.41">sn46.41</a> Vidhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.42">sn46.42</a> Cakkavattisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.43">sn46.43</a> Mārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.44">sn46.44</a> Duppaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.45">sn46.45</a> Paññavantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.46">sn46.46</a> Daliddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.47">sn46.47</a> Adaliddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.48">sn46.48</a> Ādiccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.49">sn46.49</a> Ajjhattikaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.50">sn46.50</a> Bāhiraṅgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Sākacchavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.51">sn46.51</a> Āhārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.52">sn46.52</a> Pariyāyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.53">sn46.53</a> Aggisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.54">sn46.54</a> Mettāsahagatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.55">sn46.55</a> Saṅgāravasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.56">sn46.56</a> Abhayasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Ānāpānavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.57">sn46.57</a> Aṭṭhikamahapphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.58">sn46.58</a> Puḷavakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.59">sn46.59</a> Vinīlakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.60">sn46.60</a> Vicchiddakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.61">sn46.61</a> Uddhumātakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.62">sn46.62</a> Mettāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.63">sn46.63</a> Karuṇāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.64">sn46.64</a> Muditāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.65">sn46.65</a> Upekkhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.66">sn46.66</a> Ānāpānasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Nirodhavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.67">sn46.67</a> Asubhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.68">sn46.68</a> Maraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.69">sn46.69</a> Āhārepaṭikūlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.70">sn46.70</a> Anabhiratisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.71">sn46.71</a> Aniccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.72">sn46.72</a> Dukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.73">sn46.73</a> Anattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.74">sn46.74</a> Pahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.75">sn46.75</a> Virāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.76">sn46.76</a> Nirodhasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.77-88">sn46.77-88</a> Gaṅgānadīādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>10. Appamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.89-98">sn46.89-98</a> Tathāgatādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>11. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.99-110">sn46.99-110</a> Balādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>12. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.111-120">sn46.111-120</a> Esanādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>13. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.121-129">sn46.121-129</a> Oghādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.130">sn46.130</a> Uddhambhāgiyasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>14. Punagaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.131-142">sn46.131-142</a> Punagaṅgānadīādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>15. Punaappamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.143-152">sn46.143-152</a> Punatathāgatādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>16. Punabalakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.153-164">sn46.153-164</a> Punabalādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>17. Punaesanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.165-174">sn46.165-174</a> Punaesanādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>18. Punaoghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn46.175-184">sn46.175-184</a> Punaoghādisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn47Collapse">47. Satipaṭṭhānasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn47Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Ambapālivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.1">sn47.1</a> Ambapālisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.2">sn47.2</a> Satisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.3">sn47.3</a> Bhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.4">sn47.4</a> Sālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.5">sn47.5</a> Akusalarāsisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.6">sn47.6</a> Sakuṇagghisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.7">sn47.7</a> Makkaṭasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.8">sn47.8</a> Sūdasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.9">sn47.9</a> Gilānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.10">sn47.10</a> Bhikkhunupassayasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Nālandavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.11">sn47.11</a> Mahāpurisasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.12">sn47.12</a> Nālandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.13">sn47.13</a> Cundasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.14">sn47.14</a> Ukkacelasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.15">sn47.15</a> Bāhiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.16">sn47.16</a> Uttiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.17">sn47.17</a> Ariyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.18">sn47.18</a> Brahmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.19">sn47.19</a> Sedakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.20">sn47.20</a> Janapadakalyāṇīsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Sīlaṭṭhitivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.21">sn47.21</a> Sīlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.22">sn47.22</a> Ciraṭṭhitisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.23">sn47.23</a> Parihānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.24">sn47.24</a> Suddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.25">sn47.25</a> Aññatarabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.26">sn47.26</a> Padesasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.27">sn47.27</a> Samattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.28">sn47.28</a> Lokasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.29">sn47.29</a> Sirivaḍḍhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.30">sn47.30</a> Mānadinnasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Ananussutavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.31">sn47.31</a> Ananussutasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.32">sn47.32</a> Virāgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.33">sn47.33</a> Viraddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.34">sn47.34</a> Bhāvitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.35">sn47.35</a> Satisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.36">sn47.36</a> Aññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.37">sn47.37</a> Chandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.38">sn47.38</a> Pariññātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.39">sn47.39</a> Bhāvanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.40">sn47.40</a> Vibhaṅgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Amatavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.41">sn47.41</a> Amatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.42">sn47.42</a> Samudayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.43">sn47.43</a> Maggasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.44">sn47.44</a> Satisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.45">sn47.45</a> Kusalarāsisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.46">sn47.46</a> Pātimokkhasaṁvarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.47">sn47.47</a> Duccaritasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.48">sn47.48</a> Mittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.49">sn47.49</a> Vedanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.50">sn47.50</a> Āsavasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.51-62">sn47.51-62</a> Gaṅgānadīādisuttadvādasaka</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Appamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.63-72">sn47.63-72</a> Tathāgatādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.73-84">sn47.73-84</a> Balādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.85-94">sn47.85-94</a> Esanādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>10. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn47.95-104">sn47.95-104</a> Uddhambhāgiyādisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn48Collapse">48. Indriyasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn48Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Suddhikavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.1">sn48.1</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.2">sn48.2</a> Paṭhamasotāpannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.3">sn48.3</a> Dutiyasotāpannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.4">sn48.4</a> Paṭhamaarahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.5">sn48.5</a> Dutiyaarahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.6">sn48.6</a> Paṭhamasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.7">sn48.7</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.8">sn48.8</a> Daṭṭhabbasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.9">sn48.9</a> Paṭhamavibhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.10">sn48.10</a> Dutiyavibhaṅgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Mudutaravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.11">sn48.11</a> Paṭilābhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.12">sn48.12</a> Paṭhamasaṅkhittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.13">sn48.13</a> Dutiyasaṅkhittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.14">sn48.14</a> Tatiyasaṅkhittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.15">sn48.15</a> Paṭhamavitthārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.16">sn48.16</a> Dutiyavitthārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.17">sn48.17</a> Tatiyavitthārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.18">sn48.18</a> Paṭipannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.19">sn48.19</a> Sampannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.20">sn48.20</a> Āsavakkhayasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Chaḷindriyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.21">sn48.21</a> Punabbhavasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.22">sn48.22</a> Jīvitindriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.23">sn48.23</a> Aññindriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.24">sn48.24</a> Ekabījīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.25">sn48.25</a> Suddhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.26">sn48.26</a> Sotāpannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.27">sn48.27</a> Arahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.28">sn48.28</a> Sambuddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.29">sn48.29</a> Paṭhamasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.30">sn48.30</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Sukhindriyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.31">sn48.31</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.32">sn48.32</a> Sotāpannasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.33">sn48.33</a> Arahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.34">sn48.34</a> Paṭhamasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.35">sn48.35</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.36">sn48.36</a> Paṭhamavibhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.37">sn48.37</a> Dutiyavibhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.38">sn48.38</a> Tatiyavibhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.39">sn48.39</a> Kaṭṭhopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.40">sn48.40</a> Uppaṭipāṭikasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Jarāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.41">sn48.41</a> Jarādhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.42">sn48.42</a> Uṇṇābhabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.43">sn48.43</a> Sāketasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.44">sn48.44</a> Pubbakoṭṭhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.45">sn48.45</a> Paṭhamapubbārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.46">sn48.46</a> Dutiyapubbārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.47">sn48.47</a> Tatiyapubbārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.48">sn48.48</a> Catutthapubbārāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.49">sn48.49</a> Piṇḍolabhāradvājasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.50">sn48.50</a> Āpaṇasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Sūkarakhatavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.51">sn48.51</a> Sālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.52">sn48.52</a> Mallikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.53">sn48.53</a> Sekhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.54">sn48.54</a> Padasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.55">sn48.55</a> Sārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.56">sn48.56</a> Patiṭṭhitasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.57">sn48.57</a> Sahampatibrahmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.58">sn48.58</a> Sūkarakhatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.59">sn48.59</a> Paṭhamauppādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.60">sn48.60</a> Dutiyauppādasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Bodhipakkhiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.61">sn48.61</a> Saṁyojanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.62">sn48.62</a> Anusayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.63">sn48.63</a> Pariññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.64">sn48.64</a> Āsavakkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.65">sn48.65</a> Paṭhamaphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.66">sn48.66</a> Dutiyaphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.67">sn48.67</a> Paṭhamarukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.68">sn48.68</a> Dutiyarukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.69">sn48.69</a> Tatiyarukkhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.70">sn48.70</a> Catuttharukkhasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.71-82">sn48.71-82</a> Pācīnādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Appamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.83-92">sn48.83-92</a> Appamādavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>10. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.93-104">sn48.93-104</a> Balakaraṇīyavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>11. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.105-114">sn48.105-114</a> Esanāvagga</span>
 </div>
<div class="level4 my-3">
		 <h5>12. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.115-124">sn48.115-124</a> Oghādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>13. Punagaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.125-136">sn48.125-136</a> Punapācīnādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.137-146">sn48.137-146</a> Punaappamādavagga</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.147-158">sn48.147-158</a> Punabalakaraṇīyavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>14. Punaesanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.159-168">sn48.159-168</a> Punaesanāvagga</span>
 </div>
<div class="level4 my-3">
		 <h5>15. Punaoghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn48.169-178">sn48.169-178</a> punaoghādisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn49Collapse">49. Sammappadhānasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn49Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn49.1-12">sn49.1-12</a> Pācīnādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Appamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn49.13-22">sn49.13-22</a> Appamādavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn49.23-34">sn49.23-34</a> Balakaraṇīyādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn49.35-44">sn49.35-44</a> Esanādisuttadasaka</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn49.45-54">sn49.45-54</a> Oghādisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn50Collapse">50. Balasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn50Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.1-12">sn50.1-12</a> Balādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Appamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.13-22">sn50.13-22</a> Appamādavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.23-34">sn50.23-34</a> Balakaraṇīyavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.35-44">sn50.35-44</a> Esanāvagga</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.45-54">sn50.45-54</a> Oghādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Punagaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.55-66">sn50.55-66</a> Pācīnādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.67-76">sn50.67-76</a> Punaappamādavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Punabalakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.77-88">sn50.77-88</a> Punabalakaraṇīyavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Punaesanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.89-98">sn50.89-98</a> Punaesanādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Punaoghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn50.99-108">sn50.99-108</a> Punaoghādisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn51Collapse">51. Iddhipādasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn51Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Cāpālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.1">sn51.1</a> Apārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.2">sn51.2</a> Viraddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.3">sn51.3</a> Ariyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.4">sn51.4</a> Nibbidāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.5">sn51.5</a> Iddhipadesasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.6">sn51.6</a> Samattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.7">sn51.7</a> Bhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.8">sn51.8</a> Buddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.9">sn51.9</a> Ñāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.10">sn51.10</a> Cetiyasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Pāsādakampanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.11">sn51.11</a> Pubbasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.12">sn51.12</a> Mahapphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.13">sn51.13</a> Chandasamādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.14">sn51.14</a> Moggallānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.15">sn51.15</a> Uṇṇābhabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.16">sn51.16</a> Paṭhamasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.17">sn51.17</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.18">sn51.18</a> Bhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.19">sn51.19</a> Iddhādidesanāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.20">sn51.20</a> Vibhaṅgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Ayoguḷavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.21">sn51.21</a> Maggasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.22">sn51.22</a> Ayoguḷasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.23">sn51.23</a> Bhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.24">sn51.24</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.25">sn51.25</a> Paṭhamaphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.26">sn51.26</a> Dutiyaphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.27">sn51.27</a> Paṭhamaānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.28">sn51.28</a> Dutiyaānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.29">sn51.29</a> Paṭhamabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.30">sn51.30</a> Dutiyabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.31">sn51.31</a> Moggallānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.32">sn51.32</a> Tathāgatasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.33-44">sn51.33-44</a> Gaṅgānadīādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Appamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.45-54">sn51.45-54</a> Appamādavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.55-66">sn51.55-66</a> Balakaraṇīyavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.67-76">sn51.67-76</a> Esanāvagga</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn51.77-86">sn51.77-86</a> Oghādisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn52Collapse">52. Anuruddhasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn52Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Rahogatavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.1">sn52.1</a> Paṭhamarahogatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.2">sn52.2</a> Dutiyarahogatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.3">sn52.3</a> Sutanusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.4">sn52.4</a> Paṭhamakaṇḍakīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.5">sn52.5</a> Dutiyakaṇḍakīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.6">sn52.6</a> Tatiyakaṇḍakīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.7">sn52.7</a> Taṇhākkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.8">sn52.8</a> Salaḷāgārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.9">sn52.9</a> Ambapālivanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.10">sn52.10</a> Bāḷhagilānasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.11">sn52.11</a> Kappasahassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.12">sn52.12</a> Iddhividhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.13">sn52.13</a> Dibbasotasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.14">sn52.14</a> Cetopariyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.15">sn52.15</a> Ṭhānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.16">sn52.16</a> Kammasamādānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.17">sn52.17</a> Sabbatthagāminisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.18">sn52.18</a> Nānādhātusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.19">sn52.19</a> Nānādhimuttisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.20">sn52.20</a> Indriyaparopariyattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.21">sn52.21</a> Jhānādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.22">sn52.22</a> Pubbenivāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.23">sn52.23</a> Dibbacakkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn52.24">sn52.24</a> Āsavakkhayasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn53Collapse">53. Jhānasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn53Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Gaṅgāpeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn53.1-12">sn53.1-12</a> Jhānādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Appamādavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn53.13-22">sn53.13-22</a> Appamādavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Balakaraṇīyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn53.23-34">sn53.23-34</a> Balakaraṇīyavagga</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Esanāvagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn53.35-44">sn53.35-44</a> Esanāvagga</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Oghavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn53.45-54">sn53.45-54</a> Oghādisutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn54Collapse">54. Ānāpānasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn54Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Ekadhammavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.1">sn54.1</a> Ekadhammasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.2">sn54.2</a> Bojjhaṅgasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.3">sn54.3</a> Suddhikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.4">sn54.4</a> Paṭhamaphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.5">sn54.5</a> Dutiyaphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.6">sn54.6</a> Ariṭṭhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.7">sn54.7</a> Mahākappinasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.8">sn54.8</a> Padīpopamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.9">sn54.9</a> Vesālīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.10">sn54.10</a> Kimilasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dutiyavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.11">sn54.11</a> Icchānaṅgalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.12">sn54.12</a> Kaṅkheyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.13">sn54.13</a> Paṭhamaānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.14">sn54.14</a> Dutiyaānandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.15">sn54.15</a> Paṭhamabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.16">sn54.16</a> Dutiyabhikkhusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.17">sn54.17</a> Saṁyojanappahānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.18">sn54.18</a> Anusayasamugghātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.19">sn54.19</a> Addhānapariññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn54.20">sn54.20</a> Āsavakkhayasutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn55Collapse">55. Sotāpattisaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn55Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Veḷudvāravagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.1">sn55.1</a> Cakkavattirājasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.2">sn55.2</a> Brahmacariyogadhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.3">sn55.3</a> Dīghāvuupāsakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.4">sn55.4</a> Paṭhamasāriputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.5">sn55.5</a> Dutiyasāriputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.6">sn55.6</a> Thapatisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.7">sn55.7</a> Veḷudvāreyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.8">sn55.8</a> Paṭhamagiñjakāvasathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.9">sn55.9</a> Dutiyagiñjakāvasathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.10">sn55.10</a> Tatiyagiñjakāvasathasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Rājakārāmavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.11">sn55.11</a> Sahassabhikkhunisaṅghasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.12">sn55.12</a> Brāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.13">sn55.13</a> Ānandattherasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.14">sn55.14</a> Duggatibhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.15">sn55.15</a> Duggativinipātabhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.16">sn55.16</a> Paṭhamamittāmaccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.17">sn55.17</a> Dutiyamittāmaccasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.18">sn55.18</a> Paṭhamadevacārikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.19">sn55.19</a> Dutiyadevacārikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.20">sn55.20</a> Tatiyadevacārikasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Saraṇānivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.21">sn55.21</a> Paṭhamamahānāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.22">sn55.22</a> Dutiyamahānāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.23">sn55.23</a> Godhasakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.24">sn55.24</a> Paṭhamasaraṇānisakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.25">sn55.25</a> Dutiyasaraṇānisakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.26">sn55.26</a> Paṭhamaanāthapiṇḍikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.27">sn55.27</a> Dutiyaanāthapiṇḍikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.28">sn55.28</a> Paṭhamabhayaverūpasantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.29">sn55.29</a> Dutiyabhayaverūpasantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.30">sn55.30</a> Nandakalicchavisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Puññābhisandavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.31">sn55.31</a> Paṭhamapuññābhisandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.32">sn55.32</a> Dutiyapuññābhisandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.33">sn55.33</a> Tatiyapuññābhisandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.34">sn55.34</a> Paṭhamadevapadasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.35">sn55.35</a> Dutiyadevapadasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.36">sn55.36</a> Devasabhāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.37">sn55.37</a> Mahānāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.38">sn55.38</a> Vassasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.39">sn55.39</a> Kāḷigodhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.40">sn55.40</a> Nandiyasakkasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Sagāthakapuññābhisandavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.41">sn55.41</a> Paṭhamaabhisandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.42">sn55.42</a> Dutiyaabhisandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.43">sn55.43</a> Tatiyaabhisandasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.44">sn55.44</a> Paṭhamamahaddhanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.45">sn55.45</a> Dutiyamahaddhanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.46">sn55.46</a> Suddhakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.47">sn55.47</a> Nandiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.48">sn55.48</a> Bhaddiyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.49">sn55.49</a> Mahānāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.50">sn55.50</a> Aṅgasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Sappaññavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.51">sn55.51</a> Sagāthakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.52">sn55.52</a> Vassaṁvutthasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.53">sn55.53</a> Dhammadinnasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.54">sn55.54</a> Gilānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.55">sn55.55</a> Sotāpattiphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.56">sn55.56</a> Sakadāgāmiphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.57">sn55.57</a> Anāgāmiphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.58">sn55.58</a> Arahattaphalasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.59">sn55.59</a> Paññāpaṭilābhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.60">sn55.60</a> Paññāvuddhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.61">sn55.61</a> Paññāvepullasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Mahāpaññavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.62">sn55.62</a> Mahāpaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.63">sn55.63</a> Puthupaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.64">sn55.64</a> Vipulapaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.65">sn55.65</a> Gambhīrapaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.66">sn55.66</a> Appamattapaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.67">sn55.67</a> Bhūripaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.68">sn55.68</a> Paññābāhullasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.69">sn55.69</a> Sīghapaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.70">sn55.70</a> Lahupaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.71">sn55.71</a> Hāsapaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.72">sn55.72</a> Javanapaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.73">sn55.73</a> Tikkhapaññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn55.74">sn55.74</a> Nibbedhikapaññāsutta</span>
 </div>
</div>
	 </div>
<div class="level3">
	 <h4><a href=# data-bs-toggle="collapse" data-bs-target="#sn56Collapse">56. Saccasaṁyuttaṁ</a></h4>
	 </div>
	 <div class="collapse" id="sn56Collapse">
	 <div class="my-3">
<div class="level4 my-3">
		 <h5>1. Samādhivagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.1">sn56.1</a> Samādhisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.2">sn56.2</a> Paṭisallānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.3">sn56.3</a> Paṭhamakulaputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.4">sn56.4</a> Dutiyakulaputtasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.5">sn56.5</a> Paṭhamasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.6">sn56.6</a> Dutiyasamaṇabrāhmaṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.7">sn56.7</a> Vitakkasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.8">sn56.8</a> Cintasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.9">sn56.9</a> Viggāhikakathāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.10">sn56.10</a> Tiracchānakathāsutta</span>
 </div>
<div class="level4 my-3">
		 <h5>2. Dhammacakkappavattanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.11">sn56.11</a> Dhammacakkappavattanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.12">sn56.12</a> Tathāgatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.13">sn56.13</a> Khandhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.14">sn56.14</a> Ajjhattikāyatanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.15">sn56.15</a> Paṭhamadhāraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.16">sn56.16</a> Dutiyadhāraṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.17">sn56.17</a> Avijjāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.18">sn56.18</a> Vijjāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.19">sn56.19</a> Saṅkāsanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.20">sn56.20</a> Tathasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>3. Koṭigāmavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.21">sn56.21</a> Paṭhamakoṭigāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.22">sn56.22</a> Dutiyakoṭigāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.23">sn56.23</a> Sammāsambuddhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.24">sn56.24</a> Arahantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.25">sn56.25</a> Āsavakkhayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.26">sn56.26</a> Mittasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.27">sn56.27</a> Tathasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.28">sn56.28</a> Lokasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.29">sn56.29</a> Pariññeyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.30">sn56.30</a> Gavampatisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>4. Sīsapāvanavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.31">sn56.31</a> Sīsapāvanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.32">sn56.32</a> Khadirapattasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.33">sn56.33</a> Daṇḍasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.34">sn56.34</a> Celasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.35">sn56.35</a> Sattisatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.36">sn56.36</a> Pāṇasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.37">sn56.37</a> Paṭhamasūriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.38">sn56.38</a> Dutiyasūriyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.39">sn56.39</a> Indakhīlasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.40">sn56.40</a> Vādatthikasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>5. Papātavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.41">sn56.41</a> Lokacintāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.42">sn56.42</a> Papātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.43">sn56.43</a> Mahāpariḷāhasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.44">sn56.44</a> Kūṭāgārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.45">sn56.45</a> Vālasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.46">sn56.46</a> Andhakārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.47">sn56.47</a> Paṭhamachiggaḷayugasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.48">sn56.48</a> Dutiyachiggaḷayugasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.49">sn56.49</a> Paṭhamasinerupabbatarājasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.50">sn56.50</a> Dutiyasinerupabbatarājasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>6. Abhisamayavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.51">sn56.51</a> Nakhasikhāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.52">sn56.52</a> Pokkharaṇīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.53">sn56.53</a> Paṭhamasambhejjasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.54">sn56.54</a> Dutiyasambhejjasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.55">sn56.55</a> Paṭhamamahāpathavīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.56">sn56.56</a> Dutiyamahāpathavīsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.57">sn56.57</a> Paṭhamamahāsamuddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.58">sn56.58</a> Dutiyamahāsamuddasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.59">sn56.59</a> Paṭhamapabbatūpamasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.60">sn56.60</a> Dutiyapabbatūpamasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>7. Paṭhamaāmakadhaññapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.61">sn56.61</a> Aññatrasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.62">sn56.62</a> Paccantasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.63">sn56.63</a> Paññāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.64">sn56.64</a> Surāmerayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.65">sn56.65</a> Odakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.66">sn56.66</a> Matteyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.67">sn56.67</a> Petteyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.68">sn56.68</a> Sāmaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.69">sn56.69</a> Brahmaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.70">sn56.70</a> Pacāyikasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>8. Dutiyaāmakadhaññapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.71">sn56.71</a> Pāṇātipātasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.72">sn56.72</a> Adinnādānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.73">sn56.73</a> Kāmesumicchācārasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.74">sn56.74</a> Musāvādasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.75">sn56.75</a> Pesuññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.76">sn56.76</a> Pharusavācāsutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.77">sn56.77</a> Samphappalāpasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.78">sn56.78</a> Bījagāmasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.79">sn56.79</a> Vikālabhojanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.80">sn56.80</a> Gandhavilepanasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>9. Tatiyaāmakadhaññapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.81">sn56.81</a> Naccagītasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.82">sn56.82</a> Uccāsayanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.83">sn56.83</a> Jātarūparajatasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.84">sn56.84</a> Āmakadhaññasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.85">sn56.85</a> Āmakamaṁsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.86">sn56.86</a> Kumārikasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.87">sn56.87</a> Dāsidāsasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.88">sn56.88</a> Ajeḷakasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.89">sn56.89</a> Kukkuṭasūkarasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.90">sn56.90</a> Hatthigavassasutta</span>
 </div>
<div class="level4 my-3">
		 <h5>10. Catutthaāmakadhaññapeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.91">sn56.91</a> Khettavatthusutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.92">sn56.92</a> Kayavikkayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.93">sn56.93</a> Dūteyyasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.94">sn56.94</a> Tulākūṭasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.95">sn56.95</a> Ukkoṭanasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.96-101">sn56.96-101</a> Chedanādisutta</span>
 </div>
<div class="level4 my-3">
		 <h5>11. Pañcagatipeyyālavagga</h5>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.102">sn56.102</a> Manussacutinirayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.103">sn56.103</a> Manussacutitiracchānasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.104">sn56.104</a> Manussacutipettivisayasutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.105-107">sn56.105-107</a> Manussacutidevanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.108-110">sn56.108-110</a> Devacutinirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.111-113">sn56.111-113</a> Devamanussanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.114-116">sn56.114-116</a> Nirayamanussanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.117-119">sn56.117-119</a> Nirayadevanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.120-122">sn56.120-122</a> Tiracchānamanussanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.123-125">sn56.123-125</a> Tiracchānadevanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.126-128">sn56.126-128</a> Pettimanussanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.129-130">sn56.129-130</a> Pettidevanirayādisutta</span>
 </div>

		 
		 <div class="mt-3">
 <span class="level5"><a href="<?php echo $readerPage;?>/?q=sn56.131">sn56.131</a> Pettidevapettivisayasutta</span>
 </div>
</div>
	 </div>
</div>
</div>
</div>
<script src="/assets/js/bootstrap.bundle.5.3.1.min.js"></script>
<script src="/assets/js/tocjs.js"></script>
</body>
</html>
