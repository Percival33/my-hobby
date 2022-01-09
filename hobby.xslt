<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:msxsl="urn:schemas-microsoft-com:xslt" exclude-result-prefixes="msxsl"
>
	<xsl:output method="html" indent="yes"/>
	<xsl:template match="/">

	<html lang="pl">
		<head>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>Moje hobby</title>
			<link rel="shortcut icon" href="img/favicon.ico" />
			<link rel="stylesheet" href="styles.css" />
		</head>
		
		<body>
			<div id="wrap" style="width:100vw">
				<header>
					<h1>Moje hobby - Żeglarstwo</h1>
				</header>
				<xsl:call-template name="nav"/>
				<main>
					<section>
						<xsl:call-template name="general-info"/>
					</section>
					<xsl:apply-templates select="hipertext/sailing-type"/>
					<xsl:apply-templates select="hipertext/sailors"/>
					<xsl:apply-templates select="hipertext/quiz"/>
					<xsl:apply-templates select="hipertext/results[@saved='yes']"/>
					
					<!--
					numerowanie dla obu

					zrobic formatowanie daty -> liczby

					wyswietlanie max wyniku 
						XPATH:
							max()
							current() ?-->
				</main>
			
				<footer>
					<xsl:apply-templates select="hipertext/student"/>
				</footer>
			</div>
		</body>

	</html>
	</xsl:template>
	
	
	<xsl:template name="nav">
		<nav class="clearfix">
			<div class="sub-nav">
				<a class="active" href="">Strona główna</a>
				<div class="sub-nav-alt">
					<a href="#sport">Żeglarstwo sportowe</a>
					<a href="#hobby">Żeglarstwo turystyczne</a>
				</div>
			</div>
			<!--<div class="sub-nav">
				<a href="/pictures">Galeria zdjęć</a>
			</div>
			<div class="sub-nav">
				<a href="/quiz">Quiz</a>
			</div>-->
		</nav>
	</xsl:template>

	<xsl:template name="general-info">
		<h3>
			Czym jest żeglarstwo ?
		</h3>
		<p>
			<xsl:value-of select="hipertext/sailing/definition"/>
		</p>
		<p class="center">Żeglarstwo dzieli się na dwa główne rodzaje:</p>
		<ul>
			<xsl:apply-templates select="hipertext/sailing/types/type"/>
		</ul>
	</xsl:template>
		
	<xsl:template match="sailing/types/type">
		
		<xsl:variable name="typeVariable">
			<xsl:value-of select="."/>
		</xsl:variable>
		
		<xsl:choose>
			<xsl:when test="$typeVariable = 'sport'">
				<li>
						<a href="#sport">sportowe</a>
						<svg class="left">
							<rect width="100%" height="5px" style="fill:rgba(191, 44, 56,0.5);" />
						</svg>
					</li>
			</xsl:when>
			<xsl:otherwise>
				<li>
						<a href="#hobby">turystyczne</a>
						<svg class="right">
							<rect width="100%" height="5px" style="fill:rgba(191, 44, 56,0.5);" />
						</svg>
					</li>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>

	<xsl:template match="hipertext/sailing-type">
		<section>
			<h3>
				<xsl:attribute name="id">
					<xsl:value-of select="@kind"/>
				</xsl:attribute>
				<xsl:value-of select="@kind"/>
			</h3>
			<p>
				<xsl:value-of select="description"/>
			</p>
			
			<xsl:if test="@kind='sport'">
				<div class="img-set1">
					<xsl:apply-templates select="gallery"/>
				</div>
			</xsl:if>

			<xsl:if test="@kind='hobby'">
				<div class="img-set2">
					<xsl:apply-templates select="gallery"/>
				</div>
			</xsl:if>
		</section>
	</xsl:template>
	
	<xsl:template match="hipertext/sailing-type/gallery">
		<xsl:for-each select="image">
			<div>
				<img>
					<xsl:attribute name="src">
						<xsl:value-of select="@src"/>
					</xsl:attribute>
				</img>
				<p style="font-size: 36px; color: red">
					<xsl:value-of select="."/>
				</p>
			</div>
		</xsl:for-each>	
	</xsl:template>

	<xsl:template match="hipertext/sailors/sailor">
		<div>
		<h3 style="text-align:center">
			<xsl:value-of select="name" />
			<xsl:text> </xsl:text>
			<xsl:value-of select="surname"/>
		</h3>
		<ul>
			<li>
				<p>
					Narodowość: <xsl:value-of select="nationality"/>
				</p>
			</li>
			<li>
				<p>
					Data urodzin: <xsl:value-of select="birthDate"/>
				</p>
			</li>
			<li>
				<p>
					Osiągnięcia: <xsl:value-of select="achievements"/>
				</p>
			</li>
			<li>
				<p>
					Liczba występów na Igrzyskach Olimpijskich: <xsl:value-of select="timesOnOlimpics"/>
				</p>
			</li>
			<xsl:if test="Wikipedia">
				<li>
					<p>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="Wikipedia/@src"/>
							</xsl:attribute>
							<xsl:value-of select="Wikipedia/."/>
						</a>
					</p>
				</li>
			</xsl:if>
		</ul>
		</div>
	</xsl:template>
	
	<xsl:template match="hipertext/sailors">
		<section>
			<xsl:apply-templates select="sailor"/>
		</section>
	</xsl:template>

	<xsl:template match="hipertext/quiz">
		<section>
			<h3>
				Quiz
			</h3>
		<xsl:for-each select="questionSection/question">
			<xsl:sort select="." order="ascending"/>
			<xsl:value-of select="position()"/>
			<xsl:text>. </xsl:text>
			<xsl:value-of select="."/>
			<br/>
		</xsl:for-each>
		</section>
	</xsl:template>

	<xsl:template match="hipertext/results[@saved='yes']">
		<section>
			<h3>
				Zapisane wyniki
			</h3>
			<ol style="list-style: inside">
				<xsl:apply-templates select="result"/>
			</ol>

			<h3>
				Maksymalny wynik:
			</h3>
			<ol>	
				
			</ol>
		</section>
	</xsl:template>
		
	<xsl:template match="results[@saved='yes']/result">
		<li>
			<xsl:value-of select="."/>
		</li>
	</xsl:template>
		
	<xsl:template match="student">
		<p>
			<xsl:value-of select="name"/><xsl:text> </xsl:text><xsl:value-of select="surname"/> 
			 Informatyka grupa 2 2021
		</p>
		<div class="attribution">
			Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a
                    href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
		</div>
		<a href="#">Powrót na górę</a>
	</xsl:template>
	
</xsl:stylesheet>