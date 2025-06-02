<x-layouts.base>
  <style>
    /* Container animatie */
    .success-container {
      max-width: 480px;
      margin: 5rem auto;
      padding: 2.5rem;
      background: #e6ffed;
      border: 2px solid #34d399;
      border-radius: 1rem;
      box-shadow: 0 0 15px #86efac88;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: relative;
      overflow: hidden;
    }

    h1 {
      color: #059669;
      font-size: 2.75rem;
      font-weight: 900;
      margin-bottom: 1rem;
      animation: fadeInDown 1s ease forwards;
    }

    p {
      color: #065f46;
      font-size: 1.25rem;
      margin-bottom: 2rem;
      animation: fadeInUp 1s ease forwards;
      animation-delay: 0.5s;
      opacity: 0;
    }

    a.button {
      display: inline-block;
      background: #10b981;
      color: white;
      font-weight: 600;
      padding: 0.75rem 2rem;
      border-radius: 9999px;
      text-decoration: none;
      box-shadow: 0 6px 12px #059669aa;
      transition: background-color 0.3s ease, transform 0.2s ease;
      animation: fadeIn 1.2s ease forwards;
      opacity: 0;
      animation-delay: 1s;
    }

    a.button:hover {
      background: #059669;
      transform: scale(1.05);
    }

    /* Vis animatie */
    .fish {
      position: absolute;
      bottom: 20px;
      left: -100px;
      width: 80px;
      height: 40px;
      background: linear-gradient(90deg, #34d399 0%, #10b981 100%);
      border-radius: 40px 40px 40px 40px / 20px 20px 20px 20px;
      animation: swim 6s linear infinite;
      filter: drop-shadow(0 0 3px #059669aa);
    }
    .fish::before {
      content: '';
      position: absolute;
      left: 60px;
      top: 5px;
      width: 20px;
      height: 30px;
      background: #059669;
      clip-path: polygon(0 0, 100% 50%, 0 100%);
      transform-origin: center;
      animation: tail-swing 0.6s ease-in-out infinite;
    }
    .fish::after {
      content: '';
      position: absolute;
      left: 15px;
      top: 10px;
      width: 15px;
      height: 15px;
      background: white;
      border-radius: 50%;
      box-shadow: 15px 0 0 0 white;
      animation: blink 3s infinite;
    }

    /* Keyframes */
    @keyframes swim {
      0% { left: -100px; transform: scaleX(1) translateY(0); }
      50% { transform: scaleX(1) translateY(-10px); }
      75% { transform: scaleX(-1) translateY(-10px); }
      100% { left: 110%; transform: scaleX(-1) translateY(0); }
    }
    @keyframes tail-swing {
      0%, 100% { transform: rotate(15deg); }
      50% { transform: rotate(-15deg); }
    }
    @keyframes blink {
      0%, 100% { box-shadow: 15px 0 0 0 white; }
      50% { box-shadow: 15px 0 0 0 transparent; }
    }
    @keyframes fadeInDown {
      0 { opacity: 0; transform: translateY(-20px);}
      100 { opacity: 1; transform: translateY(0);}
    }
    @keyframes fadeInUp {
      to { opacity: 1; }
    }
    @keyframes fadeIn {
      to { opacity: 1; }
    }
  </style>

  <div class="success-container">
    <h1>Boeking succesvol!</h1>
    <p>Bedankt voor je boeking bij Deleeghte.<br>We wensen je veel succes met het vangen van de mooiste vissen!</p>
    <a href="{{ route('boeken.index') }}" class="button">Terug naar Boekingen</a>

    <div class="fish" aria-hidden="true"></div>
  </div>
</x-layouts.base>
