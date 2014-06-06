function toggleReportYearly() {
  var ele = document.getElementById("reportsMonthly");
  var ele2 = document.getElementById("reportsYearly");
  {
    if(ele.style.display == "none") {
        ele.style.display = "none";
        ele2.style.display = "block";
      }

      else {
        ele.style.display = "none";
        ele2.style.display = "block";
      }
  }
}

function toggleReportMonthly() {
  var ele = document.getElementById("reportsYearly");
  var ele2 = document.getElementById("reportsMonthly");
    if(ele.style.display == "none") {
        ele.style.display = "none";
        ele2.style.display = "block";
      }

      else {
        ele.style.display = "none";
        ele2.style.display = "block";
      }
}



function toggleClientDecision() {
  var ele = document.getElementById("radio-courts-decision");
  {
        ele.style.display = "none";
  }
}

function toggleCourtDecision() {
  var ele = document.getElementById("radio-courts-decision");
  {
        ele.style.display = "block";
  }
}

function toggleRPC() {
  var ele = document.getElementById("caseOffensePenal");
  var ele2 = document.getElementById("caseOffenseSpecial");
  if(ele.style.display == "none") {
        ele.style.display = "block";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}

function toggleSpecial() {
  var ele = document.getElementById("caseOffenseSpecial");
  var ele2 = document.getElementById("caseOffensePenal");
  if(ele.style.display == "none") {
        ele.style.display = "block";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}

function toggleUpdateRelDocClient() {
  var ele = document.getElementById("toggleUpdateRelDocClient");
  var ele2 = document.getElementById("toggleUpdateRelDocOpposing");
  var ele3 = document.getElementById("toggleUpdateRelDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleUpdateRelDocOpposing() {
  var ele = document.getElementById("toggleUpdateRelDocOpposing");
  var ele2 = document.getElementById("toggleUpdateRelDocClient");
  var ele3 = document.getElementById("toggleUpdateRelDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleUpdateRelDocCourt() {
  var ele = document.getElementById("toggleUpdateRelDocCourt");
  var ele2 = document.getElementById("toggleUpdateRelDocClient");
  var ele3 = document.getElementById("toggleUpdateRelDocOpposing");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleAppDocClient() {
  var ele = document.getElementById("toggleAppDocClient");
  var ele2 = document.getElementById("toggleAppDocOpposing");
  var ele3 = document.getElementById("toggleAppDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleAppDocOpposing() {
  var ele = document.getElementById("toggleAppDocOpposing");
  var ele2 = document.getElementById("toggleAppDocClient");
  var ele3 = document.getElementById("toggleAppDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleAppDocCourt() {
  var ele = document.getElementById("toggleAppDocCourt");
  var ele2 = document.getElementById("toggleAppDocClient");
  var ele3 = document.getElementById("toggleAppDocOpposing");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleAppEvidenceDoc() {
  var ele = document.getElementById("toggleAppDoc");
  var ele2 = document.getElementById("toggleAppObj");
  var ele3 = document.getElementById("toggleAppTesti");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleAppEvidenceObj() {
  var ele = document.getElementById("toggleAppObj");
  var ele2 = document.getElementById("toggleAppDoc");
  var ele3 = document.getElementById("toggleAppTesti");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleAppEvidenceTesti() {
  var ele = document.getElementById("toggleAppTesti");
  var ele2 = document.getElementById("toggleAppDoc");
  var ele3 = document.getElementById("toggleAppObj");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}


function toggleRelDocClient() {
  var ele = document.getElementById("toggleRelDocClient");
  var ele2 = document.getElementById("toggleRelDocOpposing");
  var ele3 = document.getElementById("toggleRelDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleRelDocOpposing() {
  var ele = document.getElementById("toggleRelDocOpposing");
  var ele2 = document.getElementById("toggleRelDocClient");
  var ele3 = document.getElementById("toggleRelDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleRelDocCourt() {
  var ele = document.getElementById("toggleRelDocCourt");
  var ele2 = document.getElementById("toggleRelDocClient");
  var ele3 = document.getElementById("toggleRelDocOpposing");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleRelEvidenceDoc() {
  var ele = document.getElementById("toggleRelDoc");
  var ele2 = document.getElementById("toggleRelObj");
  var ele3 = document.getElementById("toggleRelTesti");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleRelEvidenceObj() {
  var ele = document.getElementById("toggleRelObj");
  var ele2 = document.getElementById("toggleRelDoc");
  var ele3 = document.getElementById("toggleRelTesti");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleRelEvidenceTesti() {
  var ele = document.getElementById("toggleRelTesti");
  var ele2 = document.getElementById("toggleRelDoc");
  var ele3 = document.getElementById("toggleRelObj");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}


function searchClient() {
  var ele = document.getElementById("searchClient");
  var ele2 = document.getElementById("newClient");
  if(ele.style.display == "none") {
        ele.style.display = "block";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}

function newClient() {
  var ele = document.getElementById("newClient");
  var ele2 = document.getElementById("searchClient");
  if(ele.style.display == "none") {
        ele.style.display = "block";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}

function incompleteRemarks() {
   document.getElementById('remarkstab').style.display ='block';
  var ele = document.getElementById("incompleteDiv");
  var ele2 = document.getElementById("rejectedDiv");
  if(ele.style.display == "none") {
        ele.style.display = "block";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}

function rejectedRemarks() {
   document.getElementById('remarkstab').style.display ='block';
  var ele = document.getElementById("rejectedDiv");
  var ele2 = document.getElementById("incompleteDiv");
  if(ele.style.display == "none") {
        ele.style.display = "block";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}


function toggleActionTaken() {
  var ele = document.getElementById("toggleActionTaken");
  var text = document.getElementById("actionTakenDisplay");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    }
  else {
    ele.style.display = "block";
  }
}

function toggleActionTakenPreInvestigation() {
  var ele = document.getElementById("toggleActionTakenPreInvestigation");
  var ele2 = document.getElementById("toggleActionTakenPreArraignment");
  var ele3 = document.getElementById("toggleActionTakenArraignment");
  var ele4 = document.getElementById("toggleActionTakenPreTrial");
  var ele5 = document.getElementById("toggleActionTakenTrial");
  var ele6 = document.getElementById("toggleAppeal");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
        ele4.style.display = "none";
        ele5.style.display = "none";
        ele6.style.display = "none";
    }
  else {
    ele.style.display = "block";
    ele2.style.display = "none";
    ele3.style.display = "none";
    ele4.style.display = "none";
    ele5.style.display = "none";
    ele6.style.display = "none";
  }
}

function toggleActionTakenPreArraignment() {
  var ele = document.getElementById("toggleActionTakenPreArraignment");
  var ele2 = document.getElementById("toggleActionTakenPreInvestigation");
  var ele3 = document.getElementById("toggleActionTakenArraignment");
  var ele4 = document.getElementById("toggleActionTakenPreTrial");
  var ele5 = document.getElementById("toggleActionTakenTrial");
  var ele6 = document.getElementById("toggleAppeal");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
        ele4.style.display = "none";
        ele5.style.display = "none";
        ele6.style.display = "none";
    }
  else {
    ele.style.display = "block";
    ele2.style.display = "none";
    ele3.style.display = "none";
    ele4.style.display = "none";
    ele5.style.display = "none";
    ele6.style.display = "none";
  }
}

function toggleActionTakenArraignment() {
  var ele = document.getElementById("toggleActionTakenArraignment");
  var ele2 = document.getElementById("toggleActionTakenPreInvestigation");
  var ele3 = document.getElementById("toggleActionTakenPreArraignment");
  var ele4 = document.getElementById("toggleActionTakenPreTrial");
  var ele5 = document.getElementById("toggleActionTakenTrial");
  var ele6 = document.getElementById("toggleAppeal");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
        ele4.style.display = "none";
        ele5.style.display = "none";
        ele6.style.display = "none";
    }
  else {
    ele.style.display = "block";
    ele2.style.display = "none";
    ele3.style.display = "none";
    ele4.style.display = "none";
    ele5.style.display = "none";
    ele6.style.display = "none";
  }
}

function toggleActionTakenPreTrial() {
  var ele = document.getElementById("toggleActionTakenPreTrial");
  var ele2 = document.getElementById("toggleActionTakenPreInvestigation");
  var ele3 = document.getElementById("toggleActionTakenPreArraignment");
  var ele4 = document.getElementById("toggleActionTakenArraignment");
  var ele5 = document.getElementById("toggleActionTakenTrial");
  var ele6 = document.getElementById("toggleAppeal");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
        ele4.style.display = "none";
        ele5.style.display = "none";
        ele6.style.display = "none";
    }
  else {
    ele.style.display = "block";
    ele2.style.display = "none";
    ele3.style.display = "none";
    ele4.style.display = "none";
    ele5.style.display = "none";
    ele6.style.display = "none";
  }
}

function toggleActionTakenTrial() {
  var ele = document.getElementById("toggleActionTakenTrial");
  var ele2 = document.getElementById("toggleActionTakenPreInvestigation");
  var ele3 = document.getElementById("toggleActionTakenPreArraignment");
  var ele4 = document.getElementById("toggleActionTakenArraignment");
  var ele5 = document.getElementById("toggleActionTakenPreTrial");
  var ele6 = document.getElementById("toggleAppeal");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
        ele4.style.display = "none";
        ele5.style.display = "none";
        ele6.style.display = "none";
    }
  else {
    ele.style.display = "block";
    ele2.style.display = "none";
    ele3.style.display = "none";
    ele4.style.display = "none";
    ele5.style.display = "none";
    ele6.style.display = "none";
  }
}

function toggleAppeal() {
  var ele = document.getElementById("toggleAppeal");
  var ele2 = document.getElementById("toggleActionTakenPreInvestigation");
  var ele3 = document.getElementById("toggleActionTakenPreArraignment");
  var ele4 = document.getElementById("toggleActionTakenArraignment");
  var ele5 = document.getElementById("toggleActionTakenPreTrial");
  var ele6 = document.getElementById("toggleActionTakenTrial");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
        ele4.style.display = "none";
        ele5.style.display = "none";
        ele6.style.display = "none";
    }
  else {
    ele.style.display = "block";
    ele2.style.display = "none";
    ele3.style.display = "none";
    ele4.style.display = "none";
    ele5.style.display = "none";
    ele6.style.display = "none";
  }
}


function toggleDocClient() {
  var ele = document.getElementById("toggleDocClient");
  var ele2 = document.getElementById("toggleDocOpposing");
  var ele3 = document.getElementById("toggleDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleDocOpposing() {
  var ele = document.getElementById("toggleDocOpposing");
  var ele2 = document.getElementById("toggleDocClient");
  var ele3 = document.getElementById("toggleDocCourt");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleDocCourt() {
  var ele = document.getElementById("toggleDocCourt");
  var ele2 = document.getElementById("toggleDocClient");
  var ele3 = document.getElementById("toggleDocOpposing");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleTask() {
  var ele = document.getElementById("toggleTask");
  var text = document.getElementById("taskDisplay");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    }
  else {
    ele.style.display = "block";
  }
} 

function toggleTaskRequired() {
  var ele = document.getElementById("toggleTaskRequired");
  var ele2 = document.getElementById("toggleTaskPersonal");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}

function toggleTaskPersonal() {
  var ele = document.getElementById("toggleTaskPersonal");
  var ele2 = document.getElementById("toggleTaskRequired");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
  }
}

function toggleParty() {
  var ele = document.getElementById("toggleParty");
  var text = document.getElementById("partyDisplay");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    }
  else {
    ele.style.display = "block";
  }
} 

function toggleEvent() {
  var ele = document.getElementById("toggleEvent");
  var text = document.getElementById("eventDisplay");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    }
  else {
    ele.style.display = "block";
  }
} 

function toggleEvidence() {
  var ele = document.getElementById("toggleEvidence");
  var text = document.getElementById("evidenceDisplay");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    }
  else {
    ele.style.display = "block";
  }
} 

function toggleEvidenceDoc() {
  var ele = document.getElementById("toggleDoc");
  var ele2 = document.getElementById("toggleObj");
  var ele3 = document.getElementById("toggleTesti");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleEvidenceObj() {
  var ele = document.getElementById("toggleObj");
  var ele2 = document.getElementById("toggleDoc");
  var ele3 = document.getElementById("toggleTesti");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function toggleEvidenceTesti() {
  var ele = document.getElementById("toggleTesti");
  var ele2 = document.getElementById("toggleDoc");
  var ele3 = document.getElementById("toggleObj");
  if(ele.style.display == "block") {
        ele.style.display = "none";
        ele2.style.display = "none";
        ele3.style.display = "none";
    }
  else {
    ele.style.display = "block";
            ele2.style.display = "none";
        ele3.style.display = "none";
  }
}

function showEvidence( rad )
    {
        var rads = document.getElementsByName( rad.name );
        document.getElementById( 'one' ).style.display = ( rads[0].checked ) ? 'block' : 'none';
        document.getElementById( 'two' ).style.display = ( rads[1].checked ) ? 'block' : 'none';
        document.getElementById( 'three' ).style.display = ( rads[2].checked ) ? 'block' : 'none';
    }