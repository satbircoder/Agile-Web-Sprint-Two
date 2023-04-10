function find_century(year) {
    // No negative value is allow for year
    if (year <= 0)
    return("0");
    // If year is between 1 to 100 it
    // will come in 1st century
    else if (year <= 100)
        return("1");
    else if (year % 100 == 0)
        return(parseInt(year / 100));
    else
        return(parseInt(year / 100) + 1);
  }
  function ValueChange(deathyear) {
    var century=deathyear.replace(/ /g,"-");
    document.getElementsByName("artistCentury")[0].value=find_century(century);
  }
  