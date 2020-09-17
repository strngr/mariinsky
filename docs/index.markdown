---
# Feel free to add content and custom Front Matter to this file.
# To modify the layout, see https://jekyllrb.com/docs/themes/#overriding-theme-defaults

layout: home
list_title: Всякие объявления
---
<script>
fetch('{{ site.viber.last_messages_endpoint }}')
  .then(function(response) {
    return response.json();
  })
  .then(function(records) {
    let viberCt = document.querySelector('.viber.last_messages');

    records.map(function (record) {
      let el = document.createElement('div'),
          date = new Date(record.TimeStamp);

      el.innerHTML += '<span class="name">' + record.ClientName + '</span><br />';
      el.innerHTML += '<span class="datetime">' + date.toLocaleString() + '</span><br />';
      el.innerHTML += '<span class="message">' + record.Body + '</span>';

      viberCt.appendChild(el);
    });
  });
</script>
<style>
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        max-width: 100%;
    }
    .embed-container iframe, .embed-container object, .embed-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .viber .datetime {
        font-size: 75%;
        font-style: italic;
        color: #555;
        position: relative;
        top: -5px;
    }
    .viber .name {
        font-weight: bold;
    }
    .viber {
        padding: 10px 0;
    }
    .viber > div {
        padding: 10px;
        background-color: #eee;
        margin-bottom: 10px;
    }
</style>

{% comment %}
<div class='embed-container'>
    <iframe src='https://www.youtube.com/embed/ZSdq6_dcSX4?t=4' frameborder='0' allowfullscreen></iframe>
</div>
{% endcomment %}

<div class='viber last_messages'>
    <h2 class="post-list-heading">Viber чат</h2>
</div>

<img src="{{ 'photo.jpeg' | relative_url }}" />
