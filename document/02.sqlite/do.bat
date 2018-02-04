@echo off
mkdir out
for %%a in (*.csv) do powershell .\u2s.ps1 %%a out\%%a

pause;
