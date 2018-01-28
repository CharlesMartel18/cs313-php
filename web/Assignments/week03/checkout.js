function validateAddress1(add1, status) {
  if (/^\s*\d*\s?\w*\s?\d*\s?\w*\s*$/.test(add1)) {
    document.getElementById(status).style.visibility = 'hidden';
    b = true;
  } else {
      document.getElementById(status).style.visibility = 'visible';
      b = false;
  }  
}

function validateAddress2(add2, status) {
  if (/^\s*\w+\s?(\d+)?\s*$/.test(add2)) {
    document.getElementById(status).style.visibility = 'hidden';
    b = true;
  } else {
      document.getElementById(status).style.visibility = 'visible';
      b = false;
  }
}

function validateAddCity(city, status) {
  if (/^\s*\w+\s?(\w+)?\s?(\w+)?\s*$/.test(city)) {
    document.getElementById(status).style.visibility = 'hidden';
    b = true;
  } else {
      document.getElementById(status).style.visibility = 'visible';
      b = false;
  }
}

function validateAddState(state, status) {
  var states = ["AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA",
    "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI",
    "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND",
    "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA",
    "WA", "WV", "WI", "WY"
  ];

  var statesPattern = new RegExp(states.join('|'));

  if (/^\s*([A-Z]{2})\s*$/.test(state) && statesPattern.test(state)) {
    document.getElementById(status).style.visibility = 'hidden';
    b = true;
  } else {
      document.getElementById(status).style.visibility = 'visible';
      b = false;
  }
}

function validateAddPostCode(postCode, status) {
  if (/^\s*\d{5}\s*$/.test(postCode)) {
    document.getElementById(status).style.visibility = 'hidden';
    b = true;
  } else {
      document.getElementById(status).style.visibility = 'visible';
      b = false;
  }
}