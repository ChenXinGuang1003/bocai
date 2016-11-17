@echo off
:1
taskkill /f /im DataInterface.exe
echo DataInterface.exe 在运行
tasklist |find /i "DataInterface.exe" 
if %errorlevel%==0 (goto 1) else (goto 2)
:2
echo DataInterface.exe 已经重启,请稍等片刻!!!
ping -n 8 127.1 >nul 2>nul
start DataInterface.exe