<form id="testForm">
    <input class="checkbox" name="one" type="checkbox">
    <input class="checkbox" name="two" type="checkbox">
    <input class="checkbox" name="three" type="checkbox">
    <input type="hidden" name="checkboxStr" id="checkbox_str">
    <button>Send</button>
</form>

<script>
var form = document.getElementById('testForm');

try {
    form.addEventListener("submit", submitFn, false);
} catch(e) {
    form.attachEvent("onsubmit", submitFn); //IE8
}

function submitFn(event) {
    event.preventDefault();
    var boxes = document.getElementsByClassName('checkbox');
    var checked = [];
    for(var i=0; boxes[i]; ++i){
      if(boxes[i].checked){
        checked.push(boxes[i].name);
      }
    }

    var checkedStr = checked.join();

    document.getElementById('checkbox_str').value = checkedStr;
   console.log(checkedStr);
  form.submit();

    return false;
}
</script>