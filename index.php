<?php
	if($_SERVER["HTTPS"] != "on")
	{
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"/>
		<meta name="keywords" content="hipnoterapia, hipnoterapia sp, hipnose, omni, terapia omni"/>
		<meta name="description" content="O Hipnoedu é especializado em hipnoterapia avançada e, em parceria com o Instituto de Educação Criativa, visa o desenvolvimento pessoal a partir do conhecimento."/>
		<title>
			HipnoEdu - (11) 95941-5861
		</title>
		<link rel="icon" type="image/x-icon" href="res/hipnoedu.favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<div class="container" id="inicio">
			<div class="splash">
				<!--<img src="res/hipnoedu.splash.png" alt="Fotografia de uma moça sobre as rochas com um mar de fundo"/>-->
				<div class="msg">reeduque sua mente e assuma <br/> o controle da sua vida</div>
				<div class="btn"><a href="https://api.whatsapp.com/send?phone=5511959415861&text=Quero%20saber%20mais%20sobre%20a%20Hipnoterapia&source=&data=" target="_blank">começe agora</a></div>
			</div>
			<div class="about" id="sobre">
				<div class="bubble">
					reeduque sua mente
				</div>
				<div class="details">
						O hipnoedu é especialista em hipnoterapia e reeducação da mente para transformar a vida das pessoas, colocando-as como protagonistas de suas vidas, por meio do autoconhecimento. Utiliza-se uma terapia inovadora que busca focar nas causas emocionais do problema, ressignificando-as na mente subconsciente que armazena os bloqueios causadores dos sintomas do problema.
				</div>
			</div>
			<div class="how-it-works" id="como">
				<div class="question">
					O que é hipnoterapia?
				</div>
				<div class="answer">
					Conheça a hipnoterapia, uma técnica inovadora que busca a solução do seu problema diretamente na causa emocional instalada na mente subconsciente. É nessa mente que estão armazenados emoções, sentimentos, medos, padrões de comportamento que influenciam nossa vida, decisões, atitudes, hábitos, nosso destino.
				</div>
				<div class="answer">
					É possível libertar-se de vícios, transtornos, fobias, hábitos ruins, crenças limitantes que nos fazem tanto mal. Permita-se tratar com uma terapia inovadora extremamente eficiente, eficaz, segura e duradoura, superando quaisquer problemas que estejam te atrapalhando para ter uma vida melhor.
				</div>
				<div class="question">
					Como funciona?
				</div>
				<div class="answer">
					Na sessão de avaliação você vai tirar todas as dúvidas sobre o tratamento e saber como acontece o processo da hipnoterapia. Experimenta o estado hipnótico e decide junto com o hipnoterapeuta qual a melhor forma de tratar seu problema de forma eficiente, eficaz e segura.
				</div>
				<div class="answer">
					Na sessão de avaliação você vai tirar todas as dúvidas sobre o tratamento e saber como acontece o processo da hipnoterapia. Experimenta o estado hipnótico e decide junto com o hipnoterapeuta qual a melhor forma de tratar seu problema de forma eficiente, eficaz e segura.
				</div>
			</div>
			<div class="challenges">
				<div class="title">
						descobrimos e ressignificamos a raíz dos seus problemas
				</div>
				<div class="list">
					<div class="elem" id="emotion-bloqueio">
						<div class="title">Bloqueio Emocional</div>
						<div class="desc">Você já se viu achando incapaz de assumir novos desafios na sua empresa? Ou mesmo de enfrentar uma área nova? E talvez de assumir um novo relacionamento?</div>
						<div class="link"><a href="/glossario.html#bloqueio">leia mais</a></div>
					</div>
					<div class="elem" id="emotion-ansiedade">
						<div class="title">Ansiedade</div>
						<div class="desc">A ansiedade faz com que as pessoas sofram em situações sem necessidade, ajam com impulsividade e tomem decisões irracionais, tentando depois lidar com as consequências.</div>
						<div class="link"><a href="/glossario.html#ansiedade">leia mais</a></div>
					</div>
					<div class="elem" id="emotion-autoconfiança">
						<div class="title">Autoconfiança</div>
						<div class="desc">O autoconhecimento é o segredo para se ter autoconfiança, pois assim você reconhece seus pontos fortes e melhora os pontos fracos, para alcançar seus objetivos.</div>
						<div class="link"><a href="/glossario.html#autoconfianca">leia mais</a></div>
					</div>
					<div class="elem" id="emotion-crenças">
						<div class="title">Crenças Limitantes</div>
						<div class="desc">As crenças limitantes impedem as pessoas de dar o próximo passo para o sucesso. Desbloquear las permite encontrar os caminhos para a liberdade e a felicidade.</div>
						<div class="link"><a href="/glossario.html#crencas">leia mais</a></div>
					</div>
					<div class="elem" id="emotion-outras">
						<div class="title">E muitos outros</div>
						<div class="desc">Temos um glossário que explica sobre os vários problema que a hipnoterapia pode resolver e como ela faz isso.</div>
						<div class="link"><a href="/glossario.html">Vá para o glossário</a></div>
					</div>					
				</div>
				<!--
				<div class="footer">
					Entre muitas outras dificuldades a desenvolver
				</div>
				<div class="btn yellow">
					<a href="#contato">quero me desenvolver</a>
				</div>-->
			</div>
			<div class="testimony">
				<div class="title">depoimentos</div>
				<div class="list">
					<div class="block">
						<div class="text">A hipnoterapia me desbloqueou para concentração, foco e criatividade para atingir meus objetivos.</div>
						<div class="footer">
							<div class="author">Roseaine Borger</div>
							<div class="target">Atingir meus objetivos</div>
						</div>
					</div>
					<div class="block">
						<div class="text">Minha autoconfiança aumentou muito, proporcionando superação em resultados pessoais e esportivos.</div>
						<div class="footer">
							<div class="author">Francisco Oigres</div>
							<div class="target">Superação em resultados</div>
						</div>
					</div>
					<div class="block">
						<div class="text">Passei a ter mais <br/> foco e concentração que me levou a passar no <br/> vestibular e ter boa notas na faculdade.</div>
						<div class="footer">
							<div class="author">Vitoria Takai</div>
							<div class="target">Foco e concentração</div>
						</div>
					</div>
					<div class="block">
						<div class="text">
							<iframe id="ytplayer" type="text/html" width="280" height="180" src="https://www.youtube.com/embed/rNod_jwdn7A?" frameborder="0">
							</iframe>
						</div>
						<div class="footer">
							<div class="author">Maria do Carmo</div>
							<div class="target">Felicidade e vontade de viver</div>
						</div>
					</div>
					<div class="block">
						<div class="text">
							<iframe id="ytplayer" type="text/html" width="280" height="180" src="https://www.youtube.com/embed/eAuiR9sYu_c?" frameborder="0">
							</iframe>
						</div>
						<div class="footer">
							<div class="author">Francisco Correia</div>
							<div class="target">Autoconfiança para falar em público</div>
						</div>
					</div>
				</div>
				<div class="div btn yellow" id="see-more" onclick="toggle_testimonies()">veja mais</div>
				<div class="list extra" id="extra-testimonies">
						<div class="block">
							<div class="text">Minha vida pessoal e profissional foi transformada para o sucesso, <br/> hoje eu tenho controle da minha vida.</div>
							<div class="footer">
								<div class="author">Fernando Sedeug</div>
								<div class="target">Sucesso pessoal e profissional</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Superei minha <br/> ansiedade e preocupação, agora confio em mim, sei me expor e sei que mereço ser criativo. </div>
							<div class="footer">
								<div class="author">Felipe Almeida</div>
								<div class="target">Criatividade e autoconfiança</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Desbloqueei minha <br/> carreira para o que me <br/> impedia de ser criativo <br/> e de ter mais foco e concentração.</div>
							<div class="footer">
								<div class="author">Thiago Erjo </div>
								<div class="target">Criatividade, foco e concentração</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Superei minha <br/> tristeza e depressão, conquistei o autocontrole da minha vida com felicidade e liberdade.</div>
							<div class="footer">
								<div class="author">Carmo Selestial</div>
								<div class="target">Autocontrole, felicidade e liberdade</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Conquistei a trans-<br/>formação da minha vida para a educação, aprendizado e autoconhecimento.</div>
							<div class="footer">
								<div class="author">Fernando Peacelove</div>
								<div class="target">Educação, aprendizado e autoconhecimento</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Obtive foco, con-<br/>centração e determinação para o aprendizado e sucesso nos negócios e na vida pessoal.</div>
							<div class="footer">
								<div class="author">Pieter Albertini</div>
								<div class="target">Foco, concentração e determinação</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Encontrei e superei <br/> o que me impedia para ter sucesso pessoal, nos negócios e nas finanças.</div>
							<div class="footer">
								<div class="author">Robson Pereira</div>
								<div class="target">Sucesso pessoal e nos negócios</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Hoje tenho controle <br/> da minha vida, me vejo <br/> linda e com sucesso profissional com liberdade e felicidade.</div>
							<div class="footer">
								<div class="author">Barbara Silvestre</div>
								<div class="target">Sucesso profissional, liberdade e felicidad</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Meus resultados <br/> profissionais com a hipnoterapia contribuíram com criatividade, análise e estratégias.</div>
							<div class="footer">
								<div class="author">Lucas Namremiz</div>
								<div class="target">Resultados profissionais</div>
							</div>
						</div>
						<div class="block">
							<div class="text">Consegui um corpo <br/> saudável e dentro do meu peso ideal sem sacrifício alimentar e excesso de exercícios.</div>
							<div class="footer">
								<div class="author">Sandra Mador</div>
								<div class="target">Sucesso pessoal, corpo saudável</div>
							</div>
						</div>
					</div>
			</div>
			<div class="staff">
				<div class="title">profissionais especializados</div>
				<div class="list">
					<div class="profile">
						<div class="picture">
							<img src="res/hipnoedu.lucy.png" alt="Imagem da profissional Lucy Mari"/>
						</div>
						<div class="name">Lucy Mari</div>
						<div class="description">Hipnoterapeuta formada pela OMNI Brasil e Educadora formada pela USP.</div>
						<div class="social">
							<div class="face"><a href="https://www.facebook.com/lucymaricriativo" target="_blank"><img src="res/iconmonstr.facebook.svg" alt="logo do Facebook"></a></div>
							<div class="insta"><a href="https://www.instagram.com/lucymaricriativo" target="_blank"><img src="res/iconmonstr.instagram.svg" alt="logo do Instagram"></a></div>
							<div class="in"><a href="https://www.linkedin.com/in/lucymari" target="_blank"><img src="res/iconmonstr.linkedin.svg" alt="logo do linkedin"></a></div>
						</div>
					</div>
					<div class="profile">
						<div class="picture">
							<img src="res/hipnoedu.rafael.png" alt="Imagem do profissional Rafael Segato"/>
						</div>
						<div class="name">Rafael Segato</div>
						<div class="description">Hipnoterapeuta formado pela OMNI Brasil.</div>
						<div class="social">
							<div class="face"><a href="https://www.facebook.com/rafael.segatosouza.1" target="_blank"><img src="res/iconmonstr.facebook.svg" alt="logo do Facebook"></a></div>
							<div class="insta"><a href="https://www.instagram.com/rafaelsegatosouza/" target="_blank"><img src="res/iconmonstr.instagram.svg" alt="logo do Instagram"></a></div>
							<div class="in"><a href="https://www.linkedin.com/in/rafaelsegatosouza/" target="_blank"><img src="res/iconmonstr.linkedin.svg" alt="logo do linkedin"></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="social-sec">
				<div class="title">impacto social</div>
				<div class="desc">O <i>HipnoEdu</i>, além de atuar com o autoconhecimento e a reeducação da mente de centenas de milhares pessoas, apoia e investe nas ações sociais da ONG <a href="https://institutocriativo.org.br"><strong><i>Instituto Criativo</i></strong></a>, doando 50% do seu lucro líquido nas ações sociais de educação criativa e inovadora, impactando crianças, jovens em busca do primeiro emprego, terceira idade e desempregados.</div>
			</div>
			<div class="contact col" id="contato">
				<div class="title">entre em contato</div>
				<div class="iflex row center max-width wrap">
					<div class="info iflex col">
						<img src="res/hipnoedu.logo.std.h.b.svg" />
						<div class="text email t-center"><a href="mailto:contato@hipnoedu.com.br">contato@hipnoedu.com.br</a></div>
						<div class="text t-center"><a href="https://api.whatsapp.com/send?phone=5511959415861&text=Quero%20saber%20mais%20sobre%20a%20Hipnoterapia&source=&data=">(11) 95941-5861</a></div>
						<div class="text social iflex row center">
							<div class="item face"><a href="https://www.facebook.com/hipnoedu/" target="_blank"><img src="res/iconmonstr.facebook.b.svg" alt="logo do Facebook"></a></div>
							<div class="item insta"><a href="https://www.instagram.com/hipnoedu/" target="_blank"><img src="res/iconmonstr.instagram.b.svg" alt="logo do Instagram"></a></div>
							<div class="item whats"><a href="https://api.whatsapp.com/send?phone=5511959415861&text=Quero%20saber%20mais%20sobre%20a%20Hipnoterapia&source=&data=" target="_blank"><img src="res/iconmonstr.whatsapp.b.svg" alt="logo do whatsapp"></a></div>
							<div class="item in"><a href="https://www.linkedin.com/company/hipnoedu/" target="_blank"><img src="res/iconmonstr.linkedin.b.svg" alt="logo do linkedin"></a></div>
						</div>
						<br/>
					</div>
					<form method="post" action="/lead.php">
						<div class="form iflex col">
							<div class="error"></div>
							<div class="success"></div>
							<input type="text" name="name" placeholder="Nome*" value=""/>
							<input type="text" name="telefone" placeholder="Telefone" value=""/>
							<input type="text" name="email" placeholder="E-mail*" value=""/>
							<textarea type="text" name="message" placeholder="Mensagem" class="message"></textarea>
							<button type="submit" class="send-btn" >Enviar</button>
						</div>
					</form>
				</div>
			</div>
			<div class="localization iflex row center wrap">
					<div class="title"> endereço:</div>
					<div class="iflex col desc">
							<div class="text">Av. Queiroz Filho, 1700</div>
							<div class="text">Vila Hamburguesa</div>
							<div class="text">Condomíno Villa Lobos Office Park</div>
							<div class="text">Torre C - Life - Sala 8</div>
							<div class="text">São Paulo - SP - 05319-000</div><br/>
					</div>
					
			</div>
		</div>
		<div class="header">
			<div class="item left">
				<a href="/">
					<img src="res/hipnoedu.logo.std.h.ai.svg"/>
				</a>
			</div>
			<div class="item right">
				<a href="#inicio">início</a>
			</div>
			<div class="item right">
				<a href="#sobre">sobre</a>
			</div>
			<div class="item right">
				<a href="#como">como funciona</a>
			</div>
			<div class="item right">
				<a href="#contato">contato</a>
			</div>
		</div>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130825691-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-130825691-1');
		</script>-->
		<script>
			function toggle_testimonies() {
				document.querySelector("#extra-testimonies").style.animation = "show 15s normal";
				document.querySelector("#see-more").style.display = "none";
				setTimeout(() => {
					document.querySelector("#extra-testimonies").style.cssText = "max-height: 1000rem;";
				}, 15000);
			}
		</script>
	</body>
</html>