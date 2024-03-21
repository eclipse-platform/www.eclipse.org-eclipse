var titles = document.getElementsByClassName("title");
for (var i = 0; i < titles.length; ++i) {
  var title = titles[i];
  if (title.parentNode.id) {
    var link = document.createElement("a");
    link.href = "#" + title.parentNode.id;
    link.innerHTML = title.innerHTML;
    title.innerHTML = "";
    title.appendChild(link);
  }
}