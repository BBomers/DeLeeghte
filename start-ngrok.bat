@echo off
setlocal

REM === Pad naar ngrok aanpassen indien nodig
set NGROK_EXE=D:\Deleeghte_Webiste_API\Website\ngrok.exe

echo Starting ngrok tunnel on port 8000...
start "" %NGROK_EXE% http 8000 >nul

REM Wacht even tot ngrok klaar is
timeout /t 3 >nul

echo Fetching public ngrok URL...

REM Haal de public_url op via PowerShell en JSON parsing
for /f "delims=" %%A in ('powershell -Command ^
    "$json = Invoke-RestMethod http://127.0.0.1:4040/api/tunnels; ^
     foreach ($tunnel in $json.tunnels) { if ($tunnel.public_url -like 'https*') { $tunnel.public_url } }"') do (
    set "NGROK_URL=%%A"
)

echo ✅ Ngrok URL gevonden: %NGROK_URL%
echo.
echo Gebruik dit als je webhookUrl in Mollie:
echo %NGROK_URL%/betalingen/webhook

echo.
pause
