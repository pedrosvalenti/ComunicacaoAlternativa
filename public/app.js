// public/app.js - TTS + phrase composition
document.addEventListener('click', (e) => {
  const btn = e.target.closest('.cell');
  if (!btn) return;
  const text = btn.dataset.text;
  addToPhrase(text);
  speak(text);
});

function addToPhrase(text){
  const box = document.getElementById('phrase');
  if(!box) return;
  if(!box.dataset.phrase) box.dataset.phrase = '';
  box.dataset.phrase = (box.dataset.phrase + ' ' + text).trim();
  box.textContent = box.dataset.phrase;
}

function speak(text){
  if(!('speechSynthesis' in window)) return alert('TTS não suportado neste navegador');
  const utter = new SpeechSynthesisUtterance(text);
  // opcional: ajustar voz/velocidade
  utter.rate = 0.9;
  speechSynthesis.cancel();
  speechSynthesis.speak(utter);
}
