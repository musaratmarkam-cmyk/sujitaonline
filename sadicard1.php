<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Marriage Card Form — Downloadable (Odia support)</title>
  <style>
    :root{--accent:#c0392b;--card:#fff;--bg:#f4f6f8}
    *{box-sizing:border-box}
    body{font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Noto Sans', sans-serif;background:linear-gradient(180deg,var(--bg),#eef2f6);margin:0;padding:24px;color:#111}
    .container{max-width:920px;margin:0 auto;background:linear-gradient(180deg,#ffffff,#fbfdff);border-radius:12px;padding:22px;box-shadow:0 6px 22px rgba(18,38,63,0.08)}
    h1{margin:0 0 14px;font-size:20px}
    p.lead{margin:0 0 18px;color:#333}
    form{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
    label{display:block;font-size:13px;margin-bottom:6px}
    input[type=text], input[type=date], input[type=time], select, textarea{width:100%;padding:10px;border:1px solid #d6dde6;border-radius:8px;background:#fff;font-size:14px}
    textarea{min-height:96px;resize:vertical}
    .full{grid-column:1/-1}
    .controls{display:flex;gap:8px;align-items:center}
    .btn{padding:10px 14px;border-radius:8px;border:0;cursor:pointer;font-weight:600}
    .btn-primary{background:var(--accent);color:#fff}
    .btn-outline{background:transparent;border:1px solid #d6dde6}
    .color-sample{width:36px;height:36px;border-radius:6px;border:1px solid #ccc}
    .preview{margin-top:18px;padding:18px;border-radius:10px;background:linear-white(180deg,#fff,#fbfbff);border:1px solid #e6ebf1}
    .card{padding:18px;border-radius:10px;min-height:220px;display:flex;flex-direction:column;justify-content:space-between}
    .card .title{font-size:20px;font-weight:700}
    .card .meta{font-size:14px}
    .small{font-size:13px;color:#444}
    .footer-links{display:flex;gap:12px;align-items:center;margin-top:12px}
    .link{color:var(--accent);text-decoration:none;font-weight:600}
    /* ensure downloaded / printed text is black */
    @media print{body *{visibility:hidden}#printable, #printable *{visibility:visible}#printable{position:fixed;left:0;top:0;width:100%}}
    .black-text{color:#000 !important}
    /* responsive */
    @media (max-width:720px){form{grid-template-columns:1fr} .full{grid-column:1/-1}}
  </style>
</head>
<body>
  <div class="container">
    <h1>Marriage Card Form</h1>
    <p class="lead">Fill the form below. You can enter Odia text in the Odia box and insert it into any field. When you download or print, the form text will be black.</p>

    <form id="mc-form" autocomplete="off">
      <div>
        <label for="brideName">Bride/Groom Name</label>
        <input id="brideName" name="brideName" type="text" placeholder="Full name">
      </div>

      <div>
        <label for="village">Village</label>
        <input id="village" name="village" type="text" placeholder="Village / Locality">
      </div>

      <div>
        <label for="familyName">Family Name</label>
        <input id="familyName" name="familyName" type="text" placeholder="Family / Surname">
      </div>

      <div>
        <label for="cardColor">Card Color (pick)</label>
        <div style="display:flex;gap:8px;align-items:center">
          <input id="cardColor" name="cardColor" type="color" value="#f7c6c4">
          <div id="colorSample" class="color-sample" style="background:#f7c6c4"></div>
        </div>
      </div>

      <div>
        <label for="mandapDate">Mandap Date</label>
        <input id="mandapDate" name="mandapDate" type="date">
      </div>

      <div>
        <label for="mandapTime">Mandap Time</label>
        <input id="mandapTime" name="mandapTime" type="time">
      </div>

      <div>
        <label for="arrivalDate">Arrival Date</label>
        <input id="arrivalDate" name="arrivalDate" type="date">
      </div>

      <div>
        <label for="arrivalTime">Arrival Time</label>
        <input id="arrivalTime" name="arrivalTime" type="time">
      </div>

      <div>
        <label for="wristDate">Wrist (Anjali/Tying) Date</label>
        <input id="wristDate" name="wristDate" type="date">
      </div>

      <div>
        <label for="wristTime">Wrist Time</label>
        <input id="wristTime" name="wristTime" type="time">
      </div>

      <div class="full">
        <label for="notes">Other Notes / Venue / Directions</label>
        <textarea id="notes" name="notes" placeholder="Write anything else here..."></textarea>
      </div>

      <div class="full">
        <label>Odia text input (type/paste Odia here then click 'Insert' to put into a chosen field)</label>
        <div style="display:flex;gap:8px;align-items:flex-start">
          <textarea id="odia" placeholder="ଏଠାରେ ଓଡ଼ିଆ ଟେକ୍ସଟ୍ ପେଇଷ୍ଟ କରନ୍ତୁ"></textarea>
          <div style="display:flex;flex-direction:column;gap:8px">
            <select id="targetField">
              <option value="brideName">Bride/Groom Name</option>
              <option value="village">Village</option>
              <option value="familyName">Family Name</option>
              <option value="notes">Other Notes</option>
            </select>
            <button type="button" class="btn btn-outline" id="insertOdia">Insert into field</button>
          </div>
        </div>
      </div>

      <div class="full controls">
        <button type="button" class="btn btn-primary" id="previewBtn">Preview Card</button>
        <button type="button" class="btn btn-outline" id="downloadTxt">Download (.txt)</button>
        <button type="button" class="btn btn-outline" id="printBtn">Print / Save as PDF</button>
      </div>
    </form>

    <div id="preview" class="preview">
      <div id="printable" class="card black-text" style="background:linear-gradient(180deg,#fff, #fff);border:1px solid #ececec">
        <div>
          <div class="title" id="pv-title">[Name]</div>
          <div class="small" id="pv-family">Family: [Family]</div>
        </div>
        <div class="meta">
          <div id="pv-village">Village: [Village]</div>
          <div id="pv-dates">Mandap: [date] [time] • Arrival: [date] [time] • Wrist: [date] [time]</div>
        </div>
        <div class="small" id="pv-notes">[Notes]</div>
      </div>

      <div class="footer-links">
        <a id="whatsappShare" class="link" href="#" target="_blank">Share on WhatsApp</a>
        <a class="link" href="#" id="homeLink">Home</a>
      </div>
    </div>

  </div>

  <script>
    const cardColor = document.getElementById('cardColor');
    const colorSample = document.getElementById('colorSample');
    cardColor.addEventListener('input', e=>{colorSample.style.background=e.target.value;document.querySelector('.card').style.background=e.target.value});

    document.getElementById('insertOdia').addEventListener('click', ()=>{
      const odia = document.getElementById('odia').value;
      const target = document.getElementById(document.getElementById('targetField').value);
      if(!target) return alert('target field not found');
      target.value = odia;
    });

    document.getElementById('previewBtn').addEventListener('click', ()=>{
      const get = id=>document.getElementById(id).value || '';
      document.getElementById('pv-title').textContent = get('brideName') || '[Name]';
      document.getElementById('pv-family').textContent = 'Family: ' + (get('familyName') || '[Family]');
      document.getElementById('pv-village').textContent = 'Village: ' + (get('village') || '[Village]');
      const mandap = (get('mandapDate') ? get('mandapDate') : '[date]') + ' ' + (get('mandapTime') ? get('mandapTime') : '[time]');
      const arrival = (get('arrivalDate') ? get('arrivalDate') : '[date]') + ' ' + (get('arrivalTime') ? get('arrivalTime') : '[time]');
      const wrist = (get('wristDate') ? get('wristDate') : '[date]') + ' ' + (get('wristTime') ? get('wristTime') : '[time]');
      document.getElementById('pv-dates').textContent = 'Mandap: ' + mandap + ' • Arrival: ' + arrival + ' • Wrist: ' + wrist;
      document.getElementById('pv-notes').textContent = get('notes');
      // set printable text color to black explicitly
      document.getElementById('printable').style.color = '#000';
      // update whatsapp link
      const msg = encodeURIComponent('Invitation: ' + (get('brideName')||'') + '\n' + 'Family: ' + (get('familyName')||'') + '\n' + 'Venue: ' + (get('village')||'') + '\n' + 'Mandap: ' + mandap);
      document.getElementById('whatsappShare').href = 'https://wa.me/?text=' + msg;
    });

    document.getElementById('downloadTxt').addEventListener('click', ()=>{
      const fields = ['brideName','village','familyName','mandapDate','mandapTime','arrivalDate','arrivalTime','wristDate','wristTime','notes'];
      let out = 'Marriage Invitation Form\n------------------------\n';
      for(const f of fields){
        const el=document.getElementById(f);
        out += (el ? (el.previousElementSibling && el.previousElementSibling.tagName==='LABEL' ? el.previousElementSibling.textContent : f)+': ' : f+': ') + (el ? el.value : '') + '\n';
      }
      // ensure black text in preview when printed
      const blob = new Blob([out],{type:'text/plain;charset=utf-8'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'marriage-invitation.txt';
      document.body.appendChild(a);
      a.click();
      a.remove();
      URL.revokeObjectURL(url);
    });

    document.getElementById('printBtn').addEventListener('click', ()=>{
      // make a print-only page with black text
      const printable = document.getElementById('printable').cloneNode(true);
      const w = window.open('', '_blank');
      const style = `<style>body{font-family:Arial,Helvetica,sans-serif;color:#000} .card{padding:18px;border-radius:6px;min-height:200px} .title{font-size:20px;font-weight:700}</style>`;
      w.document.write('<!doctype html><html><head><meta charset="utf-8"><title>Print Invitation</title>'+style+'</head><body>');
      w.document.body.appendChild(printable);
      w.document.write('</body></html>');
      w.document.close();
      setTimeout(()=>w.print(),300);
    });

    // Home link - simple behaviour
    document.getElementById('homeLink').addEventListener('click', (e)=>{e.preventDefault();window.scrollTo({top:0,behavior:'smooth'});});

    // initial preview
    document.getElementById('previewBtn').click();
  </script>
<nav><a href="home.html">Home</a></nav>
</body>
</html>
