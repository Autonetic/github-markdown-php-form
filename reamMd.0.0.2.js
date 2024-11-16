async function reaMd(markdown, id){ // id used to select output element // doc used to point to a particular .md file 
  console.log("Raw Markdown: \n" + markdown);
  // API call - posts raw markdown to githubs markdown api
  const url = "https://api.github.com/markdown/raw";
  const res = await fetch(url, {
    method: 'POST',
    headers: {
        'Accept': 'application/vnd.github+json',
        'Authorization': 'YOUR AUTH TOKEN', 
        'X-GitHub-Api-Version': '2022-11-28',
        'Content-Type': 'text/plain'
    },
    body: markdown
    })
    .then(function(response) {
    return response.text();
    });
  document.getElementById(id).innerHTML =  res;
  $('code').append('<span class="command-copy"><i class="fa fa-clipboard" aria-hidden="true"></i></span>');
  
  $('code span.command-copy').click(function(e) {
    var text = $(this).parent().text().trim();
    var copyHex = document.createElement('textarea');
    copyHex.value = text
    document.body.appendChild(copyHex);
    copyHex.select();
    document.execCommand('copy');
    console.log(copyHex.value)
    document.body.removeChild(copyHex);
  });
  
  $('pre').append('<span class="command-copy"><i class="fa fa-clipboard" aria-hidden="true"></i></span>');  
  $('pre span.command-copy').click(function(e) {
    var text = $(this).parent().text().trim();
    var copyHex = document.createElement('textarea');
    copyHex.value = text
    document.body.appendChild(copyHex);
    copyHex.select();
    document.execCommand('copy');
    console.log(copyHex.value)
    document.body.removeChild(copyHex);
  });
  $("blockquote:contains('[!CAUTION]')").addClass('CAUTION');
  $("blockquote:contains('[!IMPORTANT]')").addClass('IMPORTANT');
  $("p:contains('[!CAUTION]')").addClass('CAUTION');
  $("p:contains('[!IMPORTANT]')").addClass('IMPORTANT');
};

