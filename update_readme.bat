@echo off

rem Define the README file
set README=README.md

rem Get the current date
for /f "tokens=2 delims==" %%i in ('wmic os get localdatetime /value ^| find "="') do set current_date=%%i
set formatted_date=%current_date:~0,4%-%current_date:~4,2%-%current_date:~6,2%

rem Update the Last Updated section
powershell -Command "(Get-Content %README%) -replace '^(## Last Updated.*)', '## Last Updated`n- Date: %formatted_date%' | Set-Content %README%"
