<?php

header('Content-type: application/json');
ini_set('display_errors', 0);
session_start('meliexpress');

require '../meli.php';
require '../../functions.php';

// IMPORTANTE:
// listado de dominios permitidos para acceder al servicio de búsqueda
// *********************************************************
$allowedDomains =" gmail.com hotmail.com testuser.com ";
$allowedDomains ="yungay.cl yumbel.cl viveros-chile.cl vitacura.cl vinadelmarchile.cl villarrica.org villanueva.cl villalemana.cl vilcun.cl victoriachile.cl vicmarlimitada.cl vallenar.cl uv.cl utem.cl utalca.cl uta.cl userena.cl usach.cl upla.cl uoh.cl unegocios.cl unap.cl umce.cl umag.cl ulagos.cl ufrontera.cl udec.cl uda.cl u-cursos.cl uchilefau.cl uchile.cl ucampus.cl uc.cl ubiobio.cl uaysen.cl uantof.cl uaf.gov.cl uaf.cl u.uchile.cl turistik.cl trolebusesdechile.cl tribunaldecontracionpublica.cl transantiago.cl torresdelpayne.cl torax.cl tome.cl tolten.cl tiltil.cl tie.cl tgr.cl tesoreria.cl terra.cl tercoquimbo.cl tercetribunalambiental.cl teno.cl temuco.cl telsur.cl tcgprocess.com tcchile.cl taltal.cl talcahuano.cl talca.cl talagante.cl svs.cl suseso.cl surnet.cl supplynor.cl superir.gob.cl supereduc.cl superdesalud.gob.cl superacionpobreza.cl subturismo.gob.cl subtel.gob.cl subtel.cl subpesca.cl subdere.gov.cl studiollama.cl stlltda.cl stericycle.cl ssmso.cl ssmaule.cl ssffaa.gob.cl ssdr.gov.cl ssdr.gob.cl ssdefensa.gov.cl ssconcepcion.cl ssbiobio.cl ssarauco.cl srcei.cl spensiones.cl solucionesdealtura.cl softdare.cl softcapture.cl sngp.cl sml.gob.cl sml.cl sma.gob.cl sistemasexpertos.cl sistemaexpertos.cl siss.gob.cl siss.cl simaxchile.cl sii.cl shoa.cl sgl.com sesegob.cl serviciocivil.gov.cl serviciocivil.cl servicenterpc.cl servel.cl sernatur.cl sernapesca.cl sernam.gob.cl sernam.cl sernageomin.cl sernac.cl sermusarica.cl sermearica.cl sercotec.cl sepchile.cl sensus.com senda.gob.cl sence.cl sename.cl. sename.cl senama.gov.cl senama.cl senado.cl senadis.cl segegob.cl sectra.gob.cl sec.cl sea.gob.cl scj.gob.cl scerti.com sbif.cl santodomingo.cl santiago.uoct.cl santajuana.cl santabarbara.cl sanpedrodelapaz.cl sanpablo.cl sanmiguel.cl sanjuandelacosta.cl sanjosedemaipo.cl sanjoaquin.cl sanidadnaval.cl sangregorio.cl sanfelipesalud.cl sanfe.cl sanfabian.cl sanestebanmunicipalidad.cl sanclemente.cl sancarlos.cl sanbernardo.cl sanantonio.cl saludvallenar.cl saludstgo.cl saludsanpablo.cl saludsanclemente.cl saludquillota.cl saludpica.cl saludpelarco.cl saludparral.cl saludpaine.cl saludpaillaco.cl saludoriente.cl saludohiggins.cl saludnogales.cl saludmostazal.cl saludmafil.cl saludlongavi.cl saludlagranja.cl saludhuechuraba.cl saludeltabo.cl saludelbosque.cl saludcurico.cl saludcauquenes.cl saludaysen.gov.cl saludaysen.cl saludarica.cl saludaltobiobio.cl salud.mph.cl salud.combarbala.cl salim.cl salamanca.cl sagradafamilia.cl sag.gob.cl saf.cl ryrmantenimiento.cl rioverde.cl rionegrochile.cl rioibanez.cl riohurtado.cl rioclaro.cl riocarvial.cl ricoysaludable.cl rhinomarmol.cl revistalogistec.com resalud.gov.cl requinoa.com requinoa.cl renua.cl renca.cl renaico.cl registrocivil.gob.cl registrocivil.cl redsalud.gov.cl redsalud.gov.c redsalud.gob.cl redsalu.gov.cl redsalu.gob.cl redq.cl redclinicauchile.cl recoleta.cl rdsalud.gov.cl rapidhost.cl rapanui.net rancagua.cl quintop.cl quintanormal.cl quilpue.cl quillota.cl quillon.cl quilicura.cl puyehuechile.cl putaendo.cl purranque.cl puertomontt.cl puertoaysen.cl puertoantofagasta.cl ptovaras.cl psicologos.com providencia.cl promarcachile.cl proingelec.cl prohind.cl prodemu.cl previsionsocial.gob.cl presidencia.cl portalvisviri.cl pollachilena.cl plbconstructora.cl planocubico.com pjud.cl pintana.cl pichilemu.cl pichidegua.cl pica.cl perquenco.cl penco.cl penalolen.cl penaflor.cl pedroaguirrecerda.cl parral.cl parquemet.cl pankisoft.com paine.cl padrelascasas.cl ongcidets.cl onemi.gov.cl olmue.cl oftanovalux.cl ofidex.cl odontologia.uchile.cl odepa.gob.cl nunoa.cl nuevaimperial.cl niscayah.cl niclabs.cl nic.cl nexumchile.cl neumacenter.com nacimiento.cl museosdibam.cl museoregionalaraucania.cl munizapallar.cl muniyerbasbuenas.cl munivina.cl munivicuna.cl munivalpo.cl munivaldivia.cl munitucapel.cl munitirua.com muniteodoro.cl munitel.cl munitalagante.cl munistgo.cl munispa.cl munisg.cl munisanpedro.cl munisanfernando.com munisanfelipe.cl munisanesteban.cl muniromeral.cl munirinconada.cl munirengo.cl munirauco.cl muniquintero.cl muniquemchi.cl muniquellon.cl muniqemchi.cl munipuren.cl munipuqueldon.cl munipunitaqui.cl munipumanque.cl munipuchuncavi.cl muniprimavera.cl muniporvenir.cl munipinto.cl muniperalillo.cl munipemuco.cl munipelluhue.cl munipangui.cl munipaillaco.cl munipaihuano.cl muniovalle.cl muniolivar.cl muninogales.cl muniniquen.cl munininhue.cl muninavidad.cl muninatales.cl munimulchen.cl munimelipilla.cl munimaullin.cl munimariquina.cl munimarchigue.cl munimacul.cl munilosvilos.cl munilossauces.com muniloslagos.cl munilosandes.cl munillay.cl munilinares.cl munilimache.cl munilautaro.cl munilanco.cl munilaja.cl munilahiguera.cl munilaestrella.cl munihualqui.cl muniguaitecas.cl munifutrono.cl munifrutillar.cl munifresia.cl munifreire.cl muniflorida.cl muniercilla.cl munielmonte.cl munidalcahue.cl municunco.cl municoquimbo.cl municollipulli.cl municoinco.cl municoihueco.cl municochrane.cl municipioiquique.cl municipiodesaavedra.cl municipiocabildo.cl municipalidadvicuna.cl municipalidadtucapel.cl municipalidadtimaukel.cl municipalidadtaltal.cl municipalidadsanrosendo.cl municipalidadquintadetilcoco.cl municipalidadquilaco.cl municipalidadquemchi.cl municipalidadpucon.cl municipalidadplacilla.cl municipalidadpica.cl municipalidadpetorca.cl municipalidadpanguipulli.cl municipalidadpalena.cl municipalidadollague.cl municipalidadohiggins.cl municipalidadnancagua.cl municipalidadlongavi.cl municipalidadloncoche.cl municipalidadillapel.cl municipalidadhualaihue.cl municipalidadgraneros.cl municipalidadgorbea.cl municipalidadelbosque.cl municipalidaddetortel.cl municipalidaddepelarco.cl municipalidaddemariapinto.cl municipalidaddecoelemu.cl municipalidaddecodegua.cl municipalidaddecamina.cl municipalidadcuracavi.cl municipalidadcollipulli.cl municipalidadcolbun.cl municipalidadchonchi.cl municipalidadchimbarongo.com municipalidadchimbarongo.cl municipalidadchillan.cl municipalidadchepica.cl municipalidadcalama.cl municipalidadantuco.cl municipalidadalgarrobo.cl municipaliadgorbea.cl munichue.cl munichonchi.cl munichanaral.cl municatemu.cl municastro.cl municanete.cl municallelarga.cl muniarica.com muniarica.cl muniarauco.cl muniancud.cl munialtodelcarmen.cl mundosiboney.com mulchenvirtual.cl muermos.cl mtt.gob.cl mtt.cl msramon.cl msgg.gov.cl msgg.gob.cl msanvicente.cl mranquil.cl mpumanque.cl mpuentealto.cl mpudahuel.cl mpitrufquen.cl mpirque.cl mpinto.cl mph.cl mpencahue.cl mpatria.cl mostazal.cl moptt.gov.cl mop.gov.cl mop.goc.cl monumentos.cl molina.cl mnhn.cl mnba.cl mma.gob.cl mlonquimay.cl mlareina.cl mlagunablanca.cl mlagranja.cl minvu.cl mintrab.gob.cl minsegpres.cl minsal.cl minrel.gov.cl minrel.gob.cl minpublico.cl minmujeryeg.gob.cl minmineria.cl minjusticia.cl minenergia.cl mineduc.cl mindep.cl minagri.gob.cl mim.cl mideplan.gov.cl mideplan.cl miancamu.cl mi.cl mhualaihue.cl mhn.cl metro-chile.cl metro.cl metacontrol.cl mejillones.cl med.uchile.cl mdonihue.cl mcuracautin.cl mchaiten.cl mcerrillos.cl mbienes.cl malko.cl maipu.cl mail.pucv.cl mahosalud.cl maho.cl machali.cl lota.cl losangeles.cl loprado.cl loespejo.cl lobarnechea.cl lml.cl llanquihue.cl live.cl liceorepublicadebrasil.cl liceohoteleriapucon.cl liceobinvignat.cl lebu.cl lavinoteca.cl laserena.cl lascondes.cl lascabrasmunicipalidad.cl lampa.cl lagoverdeaysen.cl lagoranco.cl laflorida.cl lacalera.cl laboratorioupla.cl kolmillo.com kespservicios.cl kbps.cl katalis.cl junjired.cl junji.cl junaeb.cl ispch.cl islademaipo.cl isl.gob.cl ipsumingenieria.cl ips.gob.cl investigaciones.cl investigaciondibam.cl investchile.gob.cl intraumatologico.cl interior.gov.cl interior.gob.cl integra.cl inta.uchile.cl institutonacional.cl innovabiobio.cl injuv.gob.cl inh.cl ingresa.cl ingematik.cl ingelan.cl ing.ucsc.cl ing.uchile.cl infor.gob.cl infor.cl infodesign.cl ine.cl indh.cl independencia.cl indap.cl ind.cl incancer.cl inapi.cl inach.cl imtocopilla.cl imsantamaria.cl imsanjavier.cl imputre.cl importadoragenesis.cl importadoraaraya.cl impanquehue.cl imovalle.cl imo.cl imme.cl imhuara.cl imfreirina.cl imda.cl imcabodehornos.cl imb.cl imantof.cl igmacomercial.cl igm.cl iglesia.cl ifop.cl idma.cl idiem.cl idic.cl icatic.cl hurtadohosp.cl huechuraba.cl huch.cl hualpenciudad.cl hsoriente.cl hsil.cl hsalvador.cl hpcordillera.cl hotmail.cl hospsanfrancisco.cl hospitalsanvicente.cl hospitalsanfernando.cl hospitaliquique.cl hospitaldipreca.cl hospitaldetalca.cl hospitaldeparral.cl hospitaldelinares.cl hospitaldecuranilahue.cl hospitaldecoronel.cl hospitaldearauco.cl hospitalcurico.cl hospitalcastro.gov.cl hospitalcastro.gob.cl hosmil.cl hoscar.cl hms.cl hmn.cl hjnc.cl hijuelas.cl heel.cl hcuch.cl hacienda.gov.cl grupopacifico.cl grupoforma.cl gorevalparaiso.gob.cl goretarapaca.gov.cl goremaule.cl goremagallanes.cl goreloslagos.cl goredelosrios.cl gorecoquimbo.cl gorebiobio.cl goreaysen.cl goreatacama.cl gorearicayparinacota.gov.cl gorearaucania.cl goreantofagasta.cl gobiernosantiago.cl gmail.copm gendarmeria.cl gasco.cl galvarinochile.cl futaleufu.cl fundaciondelasfamilias.cl fundacionchile.cl fosis.gon.cl fosis.gob.cl fosis.cl fonolab.cl fonasa.gov.cl fonasa.cl foji.cl fne.gob.cl festina.com ferexpo.cl fen.uchile.cl fdmsoft.com fch.cl fach.mil.cl fach.mi.cl fach.cl expresstoner.cl estudiois.cl estacioncentral.cl esmax.cl escuelavictorduran.cl escuelapdi.cl equiposmoval.cl e-puntaarenas.cl epi.cl englishconnection.cl enami.cl empedrado.cl emco.mil.cl emaza.cl emaresa.cl eltabo.cl elquisco.cl ejercito.cl educapenco.cl educangol.cl educacionmostazal.cl educacionmalloa.cl educacionlosangeles.cl educacionloncoche.cl educacionlascabras.cl educacionlaligua.cl educacionlagranja.cl educacionhuechuraba.cl educacioncuracautin.cl educacioncoquimbo.cl educacioncarahue.cl educacion.munimarchigue.cl educacion.mph.cl educabrero.cl ecourbe-spa.cl economia.cl econ.uchile.cl ecogreenchile.cl e-casablanca.cl ebss.cl dtpm.gob.cl dt.gob.cl dppl.cl dpp.cl dispolab.com disamtome.cl disampuertomontt.cl directemar.cl direcon.gob.cl direcon.cl dipres.cl dipreca.cl dim.uchile.cl dii.uchile.cl dicrep.cl dibam.cl dgtm.cl dgmn.cl dgf.uchile.cl dgac.gob.cl dgac.cl dft.unap.cl dfi.uchile.cl desmo.cl desarrollosocial.gov.cl desarrollosocial.gob.cl desarrollosocial.cl desamucoihueco.cl desammaullin.cl desammariquina.cl desamcalbuco.cl derecho.uchile.cl deptoantartico.com denarius.cl demyumbel.cl demtraiguen.cl demquilicura.cl dempuertomontt.cl demovalle.cl demlota.cl demlimache.cl demcuranilahue.cl demcoyhaique.cl demcoronel.cl demcisnes.cl dellibertador.gob.cl defensacivil.cl defensa.cl dcc.uchile.cl dastalcahuano.cl dasspp.cl dassanpedrodelapaz.cl dasmcoronel.cl dasmcopiapo.cl daslota.cl dascoronel.cl dasconcepcion.cl daschiguayante.cl das.uchile.cl dalcahue.cl daemvillarrica.cl daemvallenar.cl daemtucapel.cl daemtaltal.cl daemtalcahuano.cl daemspp.cl daemsanpedro.cl daemromeral.cl daemrioclaro.cl daemrequinoa.cl daemrenaico.cl daempuertomontt.cl daemplacilla.cl daempelarco.cl daemparral.cl daemniquen.cl daemmulchen.cl daemlosmuermos.cl daemllayllay.cl daemllanquihue.cl daemlitueche.cl daemlaestrella.cl daemindependencia.cl daemillapel.cl daemhuasco.cl daemhualane.cl daemfrut.cl daemfresia.cl daemdda.cl daemcurico.cl daemcopiapo.cl daemconcepcion.cl daemchillan.cl daemchiguayante.cl daemchepica.cl daemcco.cl daemcatemu.cl daemcanete.cl daemcalbuco.cl daembulnes.cl daemaltobiobio.cl daem.combarbala.cl daem.cl curico.cl curepto.cl curacodevelez.cl cultura.gob.cl cthchile.com csn.uchile.cl csmaule.com crsoriente.cl creoantofagasta.cl cplt.cl cpingenieria.cl coyhaique.cl costadelpacifico.cl cosale.cl corpotal.cl corporacionsanmiguel.cl corporacionlinares.cl corporacionislademaipo.cl corpocas.cl corplascondes.cl coronel.cl cormuval.cl cormup.cl cormunat.cl corfo.cl copiapo.cl contulmo.cl contraloria.com contraloria.cl constitucion.cl consejotransparencia.cl consejoresolutivo.cl consejoderectores.cl consejodelacultura.cl conjuaus.cl conicyt.cl congreso.cl concon.cl conchali.cl concepcion.cl concecpion.cl conaf.cl conadi.gov.cl comunaparedones.cl comunajuanfernandez.cl comudef.cl commentzconsulting.cl combarbala.cl comartel.cl coltauco.cl colina.cl codeduc.cl cochilco.cl cobquecura.cl cnr.gob.cl cnid.cl cned.cl cne.cl cncr.cl cnachile.cl cmvm.cl cmt-mag.cl cmt-chile.cl cmq.cl cmoneda.gov.cl cmds.cl cmcabogados.cl cliptecnologia.com cisterna.cl ciren.cl ciq.uchile.cl cincodreams.cl cimm.cl chillanviejo.cl chilevalora.cl chilecompra.cl chilechico.cl chile.com chiguayante.cl chanco.cl cesfampac.cl cesfamolmue.cl cesfamlascabras.cl cesfamchepica.cl cesfamcaldera.cl cerronavia.cl centroenergia.cl cenabast.cl cementeriogeneral.cl cefoso.tie.cl cecopac.cl cec.uchile.cl cdsprovidencia.cl cdots.cl cde.cl ccmvaldivia.cl ccmconcepcion.cl cchen.cl cauquenes.cl casamoneda.cl cartagena-chile.cl carahue.cl carabineros.cl capredena.gov.cl capredena.gob.cl capredena.cl calvomackenna.cl caleradetango.net caldera.cl cajta.cl cajmetro.cl cajbiobio.cl cajanegraltda.cl cabrero.cl buin.cl brandyt.cl bonex.cl bomberos.cl bibliotecasdibam.cl bibliotecanacional.cl bibliotecadesantiago.cl biblioredes.gob.cl benlatina.cl bcncons.cl bcn.cl bancoestado.cl banados.cl atta.gov.cl asur.cl asintech.cl ascparts.cl armada.cl archivonacional.cl araucanianorte.cl apstalca.cl anida.cl angol.cl anepe.cl andesminerals.cl andacollochile.cl amtc.cl amandalabarca.cl alumnos.uda.cl alumnos.ubiobio.cl ahkgroup.com agroseguros.gob.cl agenciaeducacion.cl agci.cl aduana.cl adldiagnostic.cl acuaim.cl achm.cl acee.cl accionchile.cl acapomil.cl acague.cl abretumundo.cl 88-ti.com 3ta.cl";
// *********************************************************

$meli = new Meli('2824536684426675', 'r21hdx92FxXgdnyhcFhszgypGGOa3pJi', 
				$_SESSION['MELI_access_token'], $_SESSION['MELI_refresh_token']);

if($_GET['code'] || $_SESSION['MELI_access_token']) {

	// If code exist and session is empty
	if($_GET['code'] && !($_SESSION['MELI_access_token'])) {
		// If the code was in get parameter we authorize
		
		if($_SERVER['SERVER_NAME']=='127.0.0.1'){
			$user = $meli->authorize($_GET['code'], 'https://compralibre.cl/api/meli/login-buyer/');
		}else{
			$user = $meli->authorize($_GET['code'], 'https://compralibre.cl/api/meli/login-buyer/');
		}
		
		// Now we create the sessions with the authenticated user
		$_SESSION['MELI_access_token'] = $user['body']->access_token;
		$_SESSION['MELI_expires_in'] = time() + $user['body']->expires_in;
		$_SESSION['MELI_refresh_token'] = $user['body']->refresh_token;
	} else {
		// We can check if the access token in invalid checking the time
		if($_SESSION['MELI_expires_in'] < time()) {
			try {
				// Make the refresh proccess
				$refresh = $meli->refreshAccessToken();

				// Now we create the sessions with the new parameters
				$_SESSION['MELI_access_token'] = $refresh['body']->access_token;
				$_SESSION['MELI_expires_in'] = time() + $refresh['body']->expires_in;
				$_SESSION['MELI_refresh_token'] = $refresh['body']->refresh_token;
			} catch (Exception $e) {
			  	echo "Exception: ",  $e->getMessage(), "\n";
			}
		}
	}

	// Read users/me of this user

	$authParams = array('access_token'=>$_SESSION['MELI_access_token']);
	$res = $meli->get('/users/me', $authParams);
	
	$email 					= $res['body']->email;
	$identification_number 	= $res['body']->identification->number;
	$identification_type 	= $res['body']->identification->type;
	$nickname 				= $res['body']->nickname;
	$user_id 				= $res['body']->id;
	$site_id				= $res['body']->site_id;
	$points					= $res['body']->points;
	$access_token			= $_SESSION['MELI_access_token'];
	$expires_in 			= $_SESSION['MELI_expires_in'];
	$refresh_token 			= $_SESSION['MELI_refresh_token'];
	$json					= json_encode($res);


	// Compara Dominio del comoprador para limitarlo a los dominios exclusivos de
	// Gobierno de Chile. Si no existe va a error.

	$emailDomain = substr($email, strpos($email,"@")+1, strlen($email)-strpos($email,"@"));

	$domainExists = strpos($allowedDomains,$emailDomain);

	if(!$domainExists){
		header('location: /compra/error');
		die;
	}



	// Lee si existe el registro
	$u_id = getFieldValue("SELECT user_id FROM meliexpress.buyers WHERE user_id='$user_id'","user_id");

	if($u_id){ 
		// Si existe lo actualiza
		$query = "UPDATE meliexpress.buyers SET user_id='$user_id',nickname='$nickname',email='$email',identification_number='$identification_number',identification_type='$identification_type',user_json='$json', access_token='$access_token', expires_in='$expires_in', refresh_token='$refresh_token',site_id='$site_id',points=$points WHERE user_id=$user_id";
		$q = updateQuery($query);
		
	}else{

		// Si no existe lo crea
		$query = "INSERT INTO meliexpress.buyers (user_id,nickname,email,identification_number,identification_type,user_json, access_token, expires_in, refresh_token,site_id,points) VALUES ('$user_id','$nickname','$email','$identification_number','$identification_type','$json','$access_token','$expires_in','$refresh_token','$site_id',$points)";
		$q = insertQuery($query);
		
	}

	$_SESSION['ok']="ok";

	header('location: /buscar');
	
} else {

	header('location:'.$meli->getAuthUrl('https://compralibre.cl/api/meli/login-buyer/', Meli::$AUTH_URL['MLC']));
}
