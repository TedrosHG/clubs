<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="jb/css/bootstrap.min.css">
  <script src="jq/jquery.min.js"></script>
  <script src="jb/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<!--<meta name="viewport" content="width=device-width,intial-scale=1">-->
	<title>astu student union</title>
</head>
<body>

<!-- nav bar  -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="naver">
	<div class="container">
		<div class="navbar-header" id="navheader">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#coll">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</button>
			<a href="#" class="btn btn-success" id="menu-toggle"><span class="glyphicon glyphicon-tasks"></span> </a>
			<a class="navbar-brand" href="#">ASTU clubs</a>
		</div>

		<div class="collapse navbar-collapse" id="coll">
            <ul class="nav navbar-nav navbar-left" id="navul">
            	
             	<li ><a href="index.php" id="home"> <span class="glyphicon glyphicon-home"></span> home</a></li>
             	<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">clubs <b class="caret"></b>
             		<ul class="dropdown-menu" id="drp">
             			<?php 
             			include 'config.php';
             			$query1="select * from club";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

while($row=mysqli_fetch_assoc($result1)){
    echo "<li><a href='club.php?id=$row[name]'>$row[name]</a></li>";
      }   ?>    
             			
             		</ul>
             	</a>
             	</li>

		             	<li><a href="reg.php" > <span class="glyphicons glyphicons-user-add"></span> regester</a></li>
		            	<li><a href="news.php" > <span class="glyphicon glyphicon-newspaper"></span> news</a></li>
		            	<li><a href="#about" >about us</a></li>       	  	
             </ul>
             <ul class="nav navbar-nav navbar-right" id="log">
             	<li ><a href="login.php">login</a></li> 
             </ul>
        </div>
	</div>
</nav>


<!-- side menu  -->
<div style="height:50px;"></div>
	<div class="container-fluid" id="wrapper">
		<div id="sidebar-wrapper" >
			<ul class="sidebar-nav">
             	<li ><a href="index.php"><span class="glyphicon glyphicon-home"></span> home</a></li>
             	<li ><a href="#item" data-toggle="collapse">clubs</a></li>
                    <ul class="nav collapse" id="item">
             			<?php 
             			include 'config.php';
             			$query1="select * from club";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

while($row=mysqli_fetch_assoc($result1)){
    echo "<li><a href='club.php?id=$row[name]'>$row[name]</a></li>";
      }   ?>    
             		</ul>
                <li ><a href="reg.php">regester</a></li>
            	<li><a href="news.php">news</a></li>
            	<li><a href="#about">about us</a></li>
            </ul>
		</div>
    <div id="page-content-wrapper">
		<div class="row">
             <div class="col-md-8">
			 <div class="container-fluid" id="carousel">
	 			<div id="my" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators" id="myy">
						<li data-target="#my" data-slide-to="0" class="active"></li>
						<li data-target="#my" data-slide-to="1"></li>
						<li data-target="#my" data-slide-to="2"></li>
					</ol>
				<div class="carousel-inner"  role="listbox">
					<div  class="item active">
						<img src="img/1.jpg">
					</div>
					<div  class="item ">
						<img src="img/2.jpg">
					</div>
					<div  class="item ">
						<img src="img/3.jpg">
					</div>
					<div  class="item ">
						<img src="img/4.png">
					</div>
					<div  class="item ">
						<img src="img/5.jpg">
					</div>
					<div  class="item ">
						<img src="img/6.jpg">
					</div>
					<div  class="item ">
						<img src="img/7.jfif">
					</div>
					<div  class="item ">
						<img src="img/8.jpg">
					</div>
					<div  class="item ">
						<img src="img/9.jpg">
					</div>
				</div>
					<a class="left carousel-control" href="#my" role="button" data-slide="prev">
				      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="right carousel-control" href="#my" role="button" data-slide="next">
				      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				      <span class="sr-only">Next</span>
				    </a>
					</div><!--carousel-->
				</div><!--container-->
			</div><!--colomon-->
			<div class="col-md-4">
		
					<div class="panel panel-primary" style="margin-top: 50px;">
						<div class="panel-heading">
							<p>some clubs in ASTU</p>
						</div>
						<div class="panel-body">
					<ul >
             			<?php 
             			include 'config.php';
             			$query1="select * from club";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

while($row=mysqli_fetch_assoc($result1)){
    echo "<li><a href='club.php?id=$row[name]'>$row[name]</a></li>";
      }   ?>    
             		</ul>
						</div>
						
					</div>
				
			</div>
				
		</div><!--row-->
		<div class="row">
			<div class="container-fluid">
				<div class="col-md-12">
					<div class="panel panel-primary" id="pannel">
						<div class="panel-heading">
							<p>history of astu</p>
						</div>
						<div class="panel-body">
							<p>
								Adama Science and Technology University (ASTU) was first established in 1993 as Nazareth Technical College (NTC), offering degree and diploma level education in technology fields. Later, the institution was renamed as Nazareth College of Technical Teacher Education (NCTTE), a self-explanatory label that describes what the institution used to train back then: candidates who would become technical teachers for TVET colleges/Schools across the country.

								In 2003, a new addition to NCTTE came about—introduction of business education. Nonetheless, the new entries were solely meant for similar purposes: these graduates were also expected to help overcome the existing dearth of educators in vocational institutions.

								Although it is an institution with a history of only two decades, ASTU is known for its dynamic past. It has always been responsive to the realization of national policies: training of technologists at its infant stage, and later shifting to training of technical trainers, as well as business educators, to fill the gap in TVETs. Following its inauguration in May 2006 as Adama University, the full-fledged university started opening other academic programs in other areas—an extension to its original mission.</p>
                                 <p id="hidden1">
								However, it was not until it was nominated by the Ministry of Education as Center of Excellence in Technology in 2008 that it opened various programs in applied engineering and technology. For its realization, it became a university modeled after the German paradigm: it not only became the only technical university in the nation, but also the only one led by a German professor.

								Notwithstanding closure of  some disciplines as per the new vision and mission, the ensuing three years saw flourishing of graduate programs, of which some (like a few in the undergraduate program) were exceptional to our university. The same period saw pioneering of the university in introducing PhD by Research and MA/MSC by Research programs. Before 2008, the university was stratified into faculties, and ASTU’s reach was limited to its only campus in Adama town. The university has now extended its reach to Asella, where two of the total seven schools are located. The faculties at the main campus include: School of Business, School of Engineering and Information Technologies, School of Humanities and Law, School of Natural Sciences, and School of Educational Science and Technology Teachers Education. On the other hand, the two schools in Asella are the School of Agriculture and School of Health and Hospital.

								In addition to its main concern (academics), ASTU is also host of research Institutes and enterprises. In the main campus, apart from the Institute of Continuing and Distance Education (ICDE), there exist two others: the Further Training Institute (better known as FTI) and Adama Institute of Sustainable Energy. The sister town where the two schools are located, Asella, is also host to the Artificial Insemination Institute and Asella model Agricultural Enterprise.

								Following its renaming by the Council of Ministers as Adama Science and Technology University in May 2011, the university has started working towards the attainment of becoming a center of excellence in science and technology, thereby allowing for the realization of goals set in the Growth and Transformation Plan (GTP). To this end, a South Korean has been appointed as President of the University. Currently, ASTU is setting up a Research Park, in collaboration with stakeholders and other concerned bodies: one of a kind in the Ethiopian context. The university is also venturing out to the wider community and is currently engaged in various joint undertakings.
							</p>
						</div>
						<div class="panel-footer">
							<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#hidden1">read more</button>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
			<div class="row" id="row2">
				<div class="col-md-4">
					<div class="panel panel-info" id="ict">
						<div class="panel-heading">
							<p>ict</p>
						</div>
						<div class="panel-body">
							<p>
								The term ICT is also used to refer to the convergence of audio-visual and telephone networks with computer networks through a single cabling or link system. There are large economic incentives (huge cost savings due to elimination of the telephone network) to merge the telephone network with the computer network system using a single unified system of cabling, signal distribution and management.
								In modern society ICT is ever-present, with over three billion people having access to the Internet. With approximately 8 out of 10 Internet users owning a smartphone, information and data are increasing by leaps and bounds.This rapid growth, especially in developing countries, has led ICT to become a keystone of everyday life, in which life without some facet of technology renders most of clerical, work and routine tasks dysfunctional. The most recent authoritative data, released in 2014, shows "that Internet use continues to grow steadily, at 6.6% globally in 2014 (3.3% in developed countries, 8.7% in the developing world); the number of Internet users in developing countries has doubled in five years (2009-2014), with two thirds of all people online now living in the developing world.								
							</p>
							
						</div>
						<div class="panel-footer">
							
						</div>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="panel panel-info" id="charity">
						<div class="panel-heading">
							<p>charity</p>
						</div>
						<div class="panel-body">
							<p>
								The word charity originated in late Old English to mean a "Christian love of one's fellows,"[1] and up until at least the beginning of the 20th century, this meaning remained synonymous with charity. Aside from this original meaning, charity is etymologically linked to Christianity, with the word originally entering into the English language through the Old French word "charité", which was derived from the Latin "caritas", a word commonly used in the Vulgate New Testament to translate the Greek word agape (ἀγάπη), a distinct form of "love"[6] (see the article: Charity (virtue)).
								Most forms of charity are concerned with providing basic necessities such as food, water, clothing, healthcare and shelter, but other actions may be performed as charity: visiting the imprisoned or the homebound, ransoming captives, educating orphans, even social movements. Donations to causes that benefit the unfortunate indirectly, such as donations to fund cancer research, are also charity.

							</p>
						</div>
						<div class="panel-footer">
							
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-info" id="anti-drug">
						<div class="panel-heading">
							<p>anti drug</p>
						</div>
						<div class="panel-body">
							<p>
								Drugs most often associated with this term include: alcohol, cannabis, barbiturates, benzodiazepines, cocaine, methaqualone, opioids and some substituted amphetamines. The exact cause of substance abuse is not clear, with the two predominant theories being: either a genetic disposition which is learned from others, or a habit which if addiction develops, manifests itself as a chronic debilitating disease.

								In 2010 about 5% of people (230 million) used an illicit substance.Of these 27 million have high-risk drug use otherwise known as recurrent drug use causing harm to their health, psychological problems, or social problems that put them at risk of those dangers.In 2015 substance use disorders resulted in 307,400 deaths, up from 165,000 deaths in 1990.Of these, the highest numbers are from alcohol use disorders at 137,500, opioid use disorders at 122,100 deaths, amphetamine use disorders at 12,200 deaths, and cocaine use disorders at 11,100.

							</p>
						</div>
						<div class="panel-footer">
							
						</div>
					</div>
					
				</div>
			
			</div>


			<!--third row-->
			<div class="row" id="row3">
				<div class="col-md-4">
					<div class="panel panel-default" id="icpc">
						<div class="panel-heading">
							<p>ICPC</p>
						</div>
						<div class="panel-body">
							<p>
								The ACM International Collegiate Programming Contest (the International Collegiate Programming Contest, known as the ICPC) is an annual multi-tiered competitive programming competition among the universities of world. Headquartered at Baylor University, directed by ICPC Executive Director and Baylor Professor Dr. William B. Poucher, the ICPC operates autonomous regional contests covering six continents culminating in a global World Finals every year. In 2017, 49,935 students from 3,098 universities in 111 countries participated.

								The ICPC is affiliated with the ICPC Foundation and operates under agreements with host universities and non-profits, all in accordance with the ICPC Policies and Procedures.

								Tracing its roots to 1970, over 320,000 ICPC alumni populate the professional ranks of high-tech companies, consulting firms, financial institutions, investment firms, high-tech startups, venture-capital firms, academia, and public service. ICPC Alumni are developers, software engineers, senior software engineers, leads, chiefs, CTOs, CEOs, founders, and co-founders. They are also professors, researchers, and in public service. A good number are in venture capital, helping others start companies. One is a comedian.

							</p>
						</div>
						<div class="panel-footer">
							
						</div>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="panel panel-default" id="science">
						<div class="panel-heading">
							<p>STEM</p>
						</div>
						<div class="panel-body">
							<p>
								Science, Technology, Engineering, and Mathematics (STEM), previously Science, Math, Engineering, and Technology (SMET), is a term used to group together these academic disciplines.This term is typically used when addressing education policy and curriculum choices in schools to improve competitiveness in science and technology development. It has implications for workforce development, national security concerns and immigration policy.

								The acronym came into common use shortly after an interagency meeting on science education held at the US National Science Foundation[when?] chaired by the then NSF director Rita Colwell. A director from the Office of Science division of Workforce Development for Teachers and Scientists, Peter Faletra, suggested the change from the older acronym METS to STEM. Colwell, expressing some dislike for the older acronym, responded by suggesting NSF institute the change. One of the first NSF projects to use the acronym[citation needed] was STEMTEC, the Science, Technology, Engineering and Math Teacher Education Collaborative at the University of Massachusetts Amherst, which was founded in 1998.

							</p>
						</div>
						<div class="panel-footer">
							
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default" id="space">
						<div class="panel-heading">
							<p>HIV/AIDS</p>
						</div>
						<div class="panel-body">
							<p>
								AIDS is caused by a human immunodeficiency virus (HIV), which originated in non-human primates in Central and West Africa. While various sub-groups of the virus acquired human infectivity at different times, the global pandemic had its origins in the emergence of one specific strain – HIV-1 subgroup M – in Léopoldville in the Belgian Congo (now Kinshasa in the Democratic Republic of the Congo) in the 1920s.

								There are two types of HIV: HIV-1 and HIV-2. HIV-1 is more virulent, is more easily transmitted and is the cause of the vast majority of HIV infections globally.[2] The pandemic strain of HIV-1 is closely related to a virus found in chimpanzees of the subspecies Pan troglodytes troglodytes, which live in the forests of the Central African nations of Cameroon, Equatorial Guinea, Gabon, Republic of Congo (or Congo-Brazzaville), and Central African Republic. HIV-2 is less transmittable and is largely confined to West Africa, along with its closest relative, a virus of the sooty mangabey (Cercocebus atys atys), an Old World monkey inhabiting southern Senegal, Guinea-Bissau, Guinea, Sierra Leone, Liberia, and western Ivory Coast.
							</p>
							
						</div>
						<div class="panel-footer">
							
						</div>
					</div>
					
				</div>
			
			</div>
			<div class="container" id="about">
				<div class="jumbotron" style="position:bottom;margin-bottom: 55px;">
				<h4 style="text-decoration: underline; padding-top: 1px;">abou us</h4>
				</div>
			</div>
	</div><!--section-->
</div><!--the whole page-->

<script >
	$("#menu-toggle").click ( function(e) {
		e.preventDefault(); 
		$("#wrapper").toggleClass("menuDisplayed");
	});
</script>
<nav class="navbar navbar-inverse navbar-fixed-bottom text-center" id="foot">
	<p> &copy Samuel and tedros 2011 </p>
</nav>

<!-- carousel slide  -->

</body>
</html>