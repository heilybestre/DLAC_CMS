<?php

//application controller

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Application extends CI_Controller {

  function __construct() {
    parent:: __construct();
    $this->load->spark('markdown-extra/0.0.0');
  }

  //Application Page
  function index() {
    $uid = $this->session->userdata('userid');
    if (empty($uid)) {
      redirect('login/index');
    }
    $utype = $this->People_model->getuserfield('type', $uid);

    $data['image'] = $this->People_model->getuserfield('image', $uid);
    $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

    $data['notifs'] = $this->Notification_model->select_notifs($uid);
    $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

    $data['offenses'] = $this->Case_model->select_offense();

    $this->load->view('header');
    switch ($utype) {
      case "1" :
        $data['applications'] = $this->Case_model->select_casepending();

        $this->load->view('director/menubar', $data);
        $this->load->view('director/application', $data);
        break;
      case "2" :
        $this->load->view('assistant/menubar', $data);
        $this->load->view('assistant/application', $data);
        break;
      case "3" :
        $this->load->view('secretary/menubar', $data);
        $this->load->view('secretary/application', $data);
        break;
      case "4" :
        $data['applications'] = $this->Case_model->select_mycasepending($uid);

        $this->load->view('lawyer/menubar', $data);
        $this->load->view('lawyer/application', $data);
        break;
      case "5" :
        $data['applications'] = $this->Case_model->select_mycasepending($uid);
//                $data['specialized'] = $this->People_model->select_specialized(1);
//                $data['non_specialized'] = $this->People_model->select_non_specialized(1);
        $this->load->view('intern/menubar', $data);
        $this->load->view('intern/application', $data);
        break;
    }
    $this->load->view('footer');
  }

  function view($cid) {
    $uid = $this->session->userdata('userid');
    if (empty($uid)) {
      redirect('login/index');
    }

    $utype = $this->People_model->getuserfield('type', $uid);

    $data['image'] = $this->People_model->getuserfield('image', $uid);
    $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

    $data['casecourt'] = $this->Case_model->select_casecourt($cid);
    $data['caseoffense'] = $this->Case_model->select_caseoffense($cid);
    $data['casepeople'] = $this->Case_model->select_casepeople($cid);
    $data['clientlist'] = $this->Case_model->select_caseclient($cid);
    $data['opposinglist'] = $this->Case_model->select_caseopposing($cid);
    $data['interviewee'] = $this->Case_model->select_caseinterviewee($cid);
    $data['supervising'] = $this->Case_model->select_casesupervising($cid);

    $data['evidencedoc'] = $this->Case_model->select_evidencedoc($cid);
    $data['evidenceobj'] = $this->Case_model->select_evidenceobj($cid);
    $data['evidencetes'] = $this->Case_model->select_evidencetes($cid);

    $data['new'] = $this->Case_model->select_caselog($cid, 1);
    $data['pri'] = $this->Case_model->select_caselog($cid, 2);
    $data['prt'] = $this->Case_model->select_caselog($cid, 3);
    $data['trc'] = $this->Case_model->select_caselog($cid, 4);
    $data['app'] = $this->Case_model->select_caselog($cid, 5);

    $offense = $this->Case_model->select_caseoffense($cid);

    $data['specialize'] = array();
    $data['nonspecialize'] = array();

    foreach ($offense as $o) {
      array_push($data['specialize'], $this->People_model->select_specialized($o->offenseID));
      //array_push($nonspecialize, $this->People_model->select_specialized($o->offenseID));
    }

    foreach ($offense as $o) {

      foreach ($this->People_model->select_non_specialized($o->offenseID) as $non) {

        $trial = false;

        $error = array_filter($data['specialize']);
        if (!empty($error)) {
          foreach ($data['specialize'] as $specialize) {

            if ($specialize[0]->personID == $non->personID) {
              $trial = true;
            }
          }
        }

        if ($trial == false) {

          $trial2 = false;
          foreach ($data['nonspecialize'] as $nonspecialize) {
            if ($nonspecialize->personID == $non->personID) {
              $trial2 = true;
            }
          }
          if ($trial2 == false) {
            array_push($data['nonspecialize'], $non);
          }
        }
      }
    }

    $data['interns'] = $this->People_model->select_interns();
    $data['lawyers'] = $this->People_model->select_lawyers();

    $data['case'] = $this->Case_model->select_case($cid);

    $data['notifs'] = $this->Notification_model->select_notifs($uid);
    $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

    $this->load->view('header');
    switch ($utype) {
      case "1" :
        $this->load->view('director/menubar', $data);
        $this->load->view('director/viewApplication', $data);
        break;
      case "2" :
        $this->load->view('assistant/menubar', $data);
        $this->load->view('assistant/viewApplication', $data);
        break;
      case "3" :
        $this->load->view('secretary/menubar', $data);
        $this->load->view('secretary/viewApplication', $data);
        break;
      case "4" :
        $this->load->view('lawyer/menubar', $data);
        $this->load->view('lawyer/viewApplication', $data);
        break;
      case "5" :
        $this->load->view('intern/menubar', $data);
        $this->load->view('intern/viewApplication', $data);
        break;
    }
    $this->load->view('footer');
  }

  function add($cid) {
    $this->clientinfo();
  }

  function edit($cid) {
    
  }

  function delete($cid) {
    
  }

  function accept($cid) {
    $uid = $this->session->userdata('userid');

    $datetimenow = date("Y-m-d H:i:s", now());
    $datenow = date("Y-m-d", now());

    $data['image'] = $this->People_model->getuserfield('image', $uid);
    $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

    $data['notifs'] = $this->Notification_model->select_notifs($uid);
    $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

    /* NOTIFICATION TABLE (to interview interns) */
    $appinterns = $this->Case_model->select_caseinterviewee($cid);
    foreach ($appinterns as $intern) {
      $this->Notification_model->app_accepted($intern->personID, $cid);
    }

    /* FOR INTERNS */
    $interns = $this->input->post('intern');

    foreach ($interns as $int) {
      $assign = array(
          'caseID' => $cid,
          'personID' => $int,
          'participation' => 5,
          'condition' => 'current',
          'datestart' => $datetimenow
      );
      $this->Case_model->insert_caseperson($assign);

      /* NOTIFICATION TABLE (to assigned intern/s) */
      $this->Notification_model->app_assigned($int, $cid);
    }

    /* FOR LAWYERS */
    $lawyers = $this->input->post('lawyer');
    foreach ($lawyers as $law) {
      $assign = array(
          'caseID' => $cid,
          'personID' => $law,
          'participation' => 4,
          'condition' => 'current',
          'datestart' => $datetimenow
      );
      $this->Case_model->insert_caseperson($assign);

      /* NOTIFICATION TABLE (to assigned lawyer/s) */
      $this->Notification_model->app_assigned($law, $cid);
    }

    /* LOG TABLE */

    $logaccept = array(
        'caseID' => $cid,
        'action' => 'Case accepted in the Clinic.',
        'dateTime' => $datetimenow,
        'stage' => $this->Case_model->select_case($cid)->stage,
        'category' => 'CASE'
    );
    $this->Case_model->insert_log($logaccept);

    $lawyersforlog = '';
    for ($i = 0; $i < count($lawyers); $i++) {
      if ($i == 0) {
        $lawyersforlog = $lawyersforlog . $this->People_model->getuserfield('firstname', $lawyers[$i]);
      } else if ($i == count($lawyers) - 1) {
        $lawyersforlog = $lawyersforlog . ' & ' . $this->People_model->getuserfield('firstname', $lawyers[$i]);
      } else {
        $lawyersforlog = $lawyersforlog . ', ' . $this->People_model->getuserfield('firstname', $lawyers[$i]);
      }
    }

    $internsforlog = '';
    for ($i = 0; $i < count($interns); $i++) {
      if ($i == 0) {
        $internsforlog = $internsforlog . $this->People_model->getuserfield('firstname', $interns[$i]);
      } else if ($i == count($interns) - 1) {
        $internsforlog = $internsforlog . ' & ' . $this->People_model->getuserfield('firstname', $interns[$i]);
      } else {
        $internsforlog = $internsforlog + ', ' . $this->People_model->getuserfield('firstname', $interns[$i]);
      }
    }

    $logassignlawyerandinterns = array(
        'caseID' => $cid,
        'action' => "Assigned to lawyer: $lawyersforlog <br> intern/s: $internsforlog",
        'dateTime' => $datetimenow,
        'stage' => $this->Case_model->select_case($cid)->stage,
        'category' => 'PEOPLE'
    );
    $this->Case_model->insert_log($logassignlawyerandinterns);


    /* TASK TABLE */
    $interns = $this->Case_model->select_caseinterns($cid);
    $interncount = 1;
    $intern1;
    $intern1caseload = 0;
    $intern2;
    $intern2caseload = 0;
    $case = $this->Case_model->select_case($cid);
    $caseName = $case->caseName;

    foreach ($interns as $intern) {
      $internforcaseload = $this->People_model->select_interns();

      foreach ($internforcaseload as $i) {
        if ($intern->personID == $i->personID) {
          $pid = $i->personID;
          $caseload = $i->caseload;

          ${'intern' . $interncount . 'caseload'} = $caseload;
          ${'intern' . $interncount} = $pid;
        }
      }
      $interncount++;
    }

    if ($intern1caseload > $intern2caseload) {
      $intern1task = array(
          'caseID' => $cid,
          'task' => "Set Client Meeting for $caseName",
          'assignedTo' => $intern1,
          'dateAssigned' => $datetimenow,
          'dateDue' => $datenow,
          'actionplanID' => '1'
      );
      $this->Task_model->insert_task($intern1task);

      $intern2task = array(
          'caseID' => $cid,
          'task' => "Create action plan for $caseName",
          'assignedTo' => $intern2,
          'dateAssigned' => $datetimenow,
          'dateDue' => $datenow,
          'actionplanID' => '2'
      );
      $this->Task_model->insert_task($intern2task);
    } else {
      $intern2task = array(
          'caseID' => $cid,
          'task' => "Set Client Meeting for $caseName",
          'assignedTo' => $intern2,
          'dateAssigned' => $datetimenow,
          'dateDue' => $datenow,
          'auto' => '1'
      );
      $this->Task_model->insert_task($intern2task);

      $intern1task = array(
          'caseID' => $cid,
          'task' => "Create action plan for $caseName",
          'assignedTo' => $intern1,
          'dateAssigned' => $datetimenow,
          'dateDue' => $datenow,
          'auto' => '2'
      );
      $this->Task_model->insert_task($intern1task);
    }

    $data['interns'] = $interns;
    $data['lawyers'] = $this->Case_model->select_caselawyers($cid);
    $data['caseoffense'] = $this->Case_model->select_caseoffense($cid);
    $data['case'] = $this->Case_model->select_case($cid);

    $this->load->view('header');
    $this->load->view('director/menubar', $data);
    $this->load->view('director/openCase', $data);
    $this->load->view('footer');
  }

  function rejectApplication() {

    $uid = $this->session->userdata('userid');
    $utype = $this->People_model->getuserfield('type', $uid);

    $data['image'] = $this->People_model->getuserfield('image', $uid);
    $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

    $data['notifs'] = $this->Notification_model->select_notifs($uid);
    $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

    $this->load->view('header');
    $this->load->view('intern/menubar', $data);
    $this->load->view('intern/rejectApplication', $data);
    $this->load->view('footer');
  }

  /* START - CREATE APPLICATION FUNCTIONS */

  function createapplication() {
    $uid = $this->session->userdata('userid');
    if (empty($uid)) {
      redirect('login/index');
    }
    $utype = $this->People_model->getuserfield('type', $uid);

    $data['image'] = $this->People_model->getuserfield('image', $uid);
    $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

    $data['clientlist'] = $this->People_model->externallist();
    $data['opposingpartylist'] = $this->People_model->externallist();
    $data['externals'] = $this->People_model->externallist();
    $data['lawyerlist'] = $this->People_model->lawyerlist();
    $data['internlist'] = $this->People_model->internlist();
    $data['clientid'] = $this->People_model->select_firstclient();
    $data['offenses'] = $this->Case_model->select_offense();

    $data['notifs'] = $this->Notification_model->select_notifs($uid);
    $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

    $datestring = "%Y-%m-%d";
    $timestring = "%h:%i %a";
    $time = now();

    $datenow = mdate($datestring, $time);
    $timenow = mdate($timestring, $time);
    $data['datenow'] = $datenow;
    $data['timenow'] = $timenow;

    $datetimestring = "%Y-%m-%d %H:%i:%s";

    $datetimenow = mdate($datetimestring, $time);
    $yearnowlasttwo = substr($datetimenow, 2, 2);
    $data['datetimenow'] = $datetimenow;

    $appnum = 1;

    if ($this->Case_model->get_nextappno() != null)
      $appnum = $this->Case_model->get_nextappno() + 1;

    $appnumlen = strlen($appnum);
    $caseNum = '';

    switch ($appnumlen) {
      case 1:
        $caseNum = $yearnowlasttwo . '00' . $appnum;
        break;
      case 2:
        $caseNum = $yearnowlasttwo . '0' . $appnum;
        break;
      case 3:
        $caseNum = $yearnowlasttwo . $appnum;
        break;
    }

    $data['appnumber'] = $caseNum;


    $data['userphoto'] = $this->People_model->getuserfield('image', $uid);

    $clients = array();
    $opposingparties = array();
    $this->session->set_userdata('clients', $clients);
    $this->session->set_userdata('opposingparties', $opposingparties);

    $this->load->view('header');
    $this->load->view('intern/menubar', $data);
    $this->load->view('intern/createApplication', $data);
    $this->load->view('footer');
  }

  function create() {
    extract($_POST);

    $uid = $this->session->userdata('userid');
    $datestring = "%Y-%m-%d %H:%i:%s";
    $time = now();
    $datetimenow = mdate($datestring, $time);

    if ($appincidentdateest != null)
      $incidentdate = $appincidentdateest;
    else
      $incidentdate = $appincidentdate;

    if ($appincidenttimeest != null)
      $incidenttime = $appincidenttimeest;
    else
      $incidenttime = $appincidenttime;

    /* CASE TABLE */
    $forcase = array(
        'appAdviceGiven' => $appadvicegiven,
        'appNotes' => $appnotes,
        'appSubmittedBy' => $uid,
        'appDateSubmitted' => $datetimenow,
        'appNarrative' => $appnarrative,
        'appIncidentPlace' => $appplace,
        'appIncidentCity' => $appplacecity,
        'appIncidentDate' => $incidentdate,
        'appIncidentTime' => $incidenttime,
        'status' => 2, //Pending
        'stage' => $appstage,
        'caseName' => $apptitle,
        'caseNum' => $appnumber
    );
    $this->Case_model->insert_app($forcase);
    //get the case id by last id inserted
    $caseID = $this->db->insert_id();

    /* CASE_PEOPLE TABLE (CLIENT) */
    for ($index = 0; $index < count($appclient); $index++) {
      $forcasepeopleclient = array(
          'caseID' => $caseID,
          'personID' => $appclient[$index],
          'participation' => 6, //client
          'condition' => 'current',
          'side' => $appclienttype,
          'datestart' => $datetimenow
      );
      $this->Case_model->insert_caseperson($forcasepeopleclient);
    }

    /* CASE_PEOPLE TABLE (OPPOSING PARTY) */
    $appopptype = 0;
    switch ($appclienttype) {
      case 8: $appopptype = 9;
        break;
      case 9: $appopptype = 8;
        break;
      case 10: $appopptype = 11;
        break;
      case 11: $appopptype = 10;
        break;
      case 12: $appopptype = 13;
        break;
      case 13: $appopptype = 12;
        break;
    };
    for ($index = 0; $index < count($appopposing); $index++) {
      $forcasepeopleopp = array(
          'caseID' => $caseID,
          'personID' => $appopposing[$index],
          'participation' => 7, //opposing party
          'condition' => 'current',
          'side' => $appopptype,
          'datestart' => $datetimenow
      );
      $this->Case_model->insert_caseperson($forcasepeopleopp);
    }

    /* COURT TABLE */
    if ($appcaseno == null || $appcaseno == '')
      $appcaseno = '-';

    if ($appforum != '-') {
      $forcourt = array(
          'caseID' => $caseID,
          'court' => $appforum,
          'casenumber' => $appcaseno,
          'courtstatus' => 3 //active
      );
      $this->Case_model->insert_court($forcourt);
    }

    /* INTERVIEW TABLE (INTERN) */
    $forinterviewintern = array(
        'caseID' => $caseID,
        'personID' => $uid,
        'interviewDate' => $appinterviewdate
    );
    $this->Case_model->insert_interview($forinterviewintern);

    /* INTERVIEW TABLE (LAWYER) */
    $forinterviewlawyer = array(
        'caseID' => $caseID,
        'personID' => $applawyer,
        'interviewDate' => $appinterviewdate
    );
    $this->Case_model->insert_interview($forinterviewlawyer);

    /* INTERVIEW TABLE (OTHER INTERVIEWERS) */
    for ($index = 0; $index < count($otherinterviewers); $index++) {
      $forinterviewothers = array(
          'caseID' => $caseID,
          'personID' => $otherinterviewers[$index],
          'interviewDate' => $appinterviewdate
      );
      $this->Case_model->insert_interview($forinterviewothers);
    }

    /* OFFENSE TABLE */
    $tagoffense = ''; //for tags later  

    if (isset($appoffensename)) {
      for ($index = 0; $index < count($appoffensename); $index++) {
        $data = array(
            'caseID' => $caseID,
            'offenseID' => $appoffensename [$index],
            'stage' => $appoffensestage [$index]
        );
        $this->Case_model->insert_offense($data);
        $tagoffense = $tagoffense . ' #' . $this->Case_model->select_stroffense($appoffensename[$index])->offenseName;
      }
    }

    /* EVIDENCEDOC TABLE */
    if (isset($idocname)) {
      for ($index = 0; $index < count($idocname); $index++) {
        $data = array(
            'caseID' => $caseID,
            'dparty' => $idocevidenceof[$index],
            'dname' => $idocname[$index],
            'dtype' => $idoctype[$index],
            'dstatus' => $idocstatus[$index],
            'ddesc' => $idocdesc[$index],
            'dpurpose' => $idocpurpose[$index],
            'dissueDate' => $idocdateissued[$index],
            'dissuePlace' => $idocplaceissued[$index],
            'ddateReceived' => $idocdatereceived[$index],
            'dtestified' => $idoctestify[$index],
        );
        $this->Case_model->insert_evidencedoc($data);

        /* CASE_PEOPLE TABLE (WITNESS) */
        $forcasepeopledoc = array(
            'caseID' => $caseID,
            'personID' => $idoctestify[$index],
            'participation' => 18, //witness
            'condition' => 'current',
            'side' => $idocevidenceof[$index],
            'datestart' => $datetimenow
        );
        $this->Case_model->insert_caseperson($forcasepeopledoc);
      }
    }

    /* EVIDENCEOBJ TABLE */
    if (isset($iobjname)) {
      for ($index = 0; $index < count($iobjname); $index++) {
        $data = array(
            'caseID' => $caseID,
            'oparty' => $iobjevidenceof[$index],
            'oobject' => $iobjname[$index],
            'ostatus' => $iobjstatus[$index],
            'odescription' => $iobjdesc[$index],
            'odateReceived' => $iobjdatereceived[$index],
            'odateRetrieved' => $iobjdateretrieved[$index],
            'otestified' => $iobjtestify[$index]
        );
        $this->Case_model->insert_evidenceobj($data);

        /* CASE_PEOPLE TABLE (WITNESS) */
        $forcasepeopleobj = array(
            'caseID' => $caseID,
            'personID' => $iobjtestify[$index],
            'participation' => 18, //witness
            'condition' => 'current',
            'side' => $iobjevidenceof[$index],
            'datestart' => $datetimenow
        );
        $this->Case_model->insert_caseperson($forcasepeopleobj);
      }
    }

    /* EVIDENCETES TABLE */
    if (isset($itesname)) {
      for ($index = 0; $index < count($itesname); $index++) {
        $data = array(
            'caseID' => $caseID,
            'tparty' => $itesevidenceof[$index],
            'ttestified' => $itesname[$index],
            'tpurpose' => $itespurpose[$index],
            'tstatus' => $itesstatus[$index],
            'tnarrative' => $itesnarrative[$index],
            'trelationship' => $itesrel[$index]
        );
        $this->Case_model->insert_evidencetes($data);

        /* CASE_PEOPLE TABLE (WITNESS) */
        $forcasepeopletes = array(
            'caseID' => $caseID,
            'personID' => $itesname[$index],
            'participation' => 18, //witness
            'condition' => 'current',
            'side' => $itesevidenceof[$index],
            'datestart' => $datetimenow
        );
        $this->Case_model->insert_caseperson($forcasepeopletes);
      }
    }

    /* TAGS TABLE */
    $strclienttype = $this->Case_model->select_strtype($appclienttype);
    $strclientname = '';
    for ($index = 0; $index < count($appclient); $index++) {
      $strclientname = $strclientname . ' #' . $this->People_model->getuserfield('firstname', $appclient[$index]) . ' ' . $this->People_model->getuserfield('lastname', $appclient[$index]);
    }
    $tags = $apptitle . $tagoffense . ' #' . $strclienttype->typeName . $strclientname;

    $this->Case_model->update_casetags($caseID, $tags);

    /* NOTIFICATION TABLE */
    $this->Notification_model->app_new($uid, 1, $caseID);


    /* LOG TABLE */
    $log = array(
        'caseID' => $caseID,
        'action' => 'Application has been created ',
        'dateTime' => $datetimenow,
        'stage' => $this->Case_model->select_case($caseID)->stage,
        'category' => 'APPLICATION'
    );
    $this->Case_model->insert_log($log);

    redirect('application/index');
  }

  function removeclient($clientid, $for) {
    $data['externals'] = $this->People_model->externallist();
    $data['clientid'] = $clientid;
    $data['use'] = $for;
    $data['lastname'] = $this->People_model->getuserfield('lastname', $clientid);
    $data['firstname'] = $this->People_model->getuserfield('firstname', $clientid);
    $data['middlename'] = $this->People_model->getuserfield('middlename', $clientid);

    $this->session->set_userdata('clientid', $clientid);

    $this->load->view('intern/createApplication/dropdowns', $data);
  }

  /* END - CREATE APPLICATION FUNCTIONS */

  /* START - NOTIFICATION FUNCTIONS */

  function changestatus($nid, $status) {
    $this->Notification_model->update_status($nid, $status);

    echo '<ul class="dropdown-menu notifications" id="ulnotif">';
    echo '<li class="dropdown-menu-title">';
    echo "<span>You have $notifcount->count notifications</span>";
    echo '</li>';

    foreach ($notifs as $notif) {
      echo '<li';
      if ($notif->status == 0)
        echo "style='background-color:#e8f1da'";
      echo "onclick='notifclick(<?= $notif->notificationID ?>)'>";
      echo "<a href='$notif->destination'>";

      if ($notif->category == 'application')
        echo '<span class="icon blue"><i class="icon-inbox"></i></span>';

      echo "<span class='message'> $notif->message </span>";
      echo "<span class='time'> date('M j, h:i a', strtotime($notif->dateTime)) </span>";
      echo '</a>';
      echo '</li>';
    }
    echo '</ul>';
  }

  /* END - NOTIFICATION FUNCTIONS */
}

?>
