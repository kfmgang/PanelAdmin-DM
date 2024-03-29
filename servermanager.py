# Copyright 2020 by KFMgang.
# All rights reserved.
# and is released under the "MIT License Agreement". Please see the LICENSE
# file that should have been included as part of this package.

import os, sys, time
from subprocess import check_output
from discord_webhook import DiscordWebhook, DiscordEmbed
import psutil
from threading import Thread
from time import sleep
import json

c = open("config/config.json", 'r+')
config = json.load(c)

Status = config['Status']
Max_Ram = config['max_ram']
Server_Path = config['Path_To_Server']
Max_System_Ram = config['max_system_ram']
Server_Folder = Server_Path.strip('deadmatterServer.exe')
#SteamCMDInstall = config['Steam_CMD_Path']
RamRefresh = config['RamRefresh']
Ram_Refresh_Timer = config['Ram_Clean_Timer']
Server_Check_Timer = config['Server_Check_Timer']
SteamUser = config['SteamUsername']
SteamPass = config['SteamPassword']


Status = ""

def checkIfProcessRunning(processName):
    for proc in psutil.process_iter():
        try:
            if processName.lower() in proc.name().lower():
                return True
        except (psutil.NoSuchProcess, psutil.AccessDenied, psutil.ZombieProcess):
            pass
    return False;


def checkrunning():
    global Status
    while 1:
        c = open("config/config.json", 'r+')
        config = json.load(c)
        Status = config['Status']
        if checkIfProcessRunning('deadmatterServer.exe') is True:
            print('Dead Matter Server is runing')
            for proc in psutil.process_iter():
                if proc.name() == "deadmatterServer.exe":
                    pid = proc.pid
            checkcrash()



def checkcrash():
    global Status
    while 1:
        if checkIfProcessRunning('deadmatterServer.exe') is False and Status == 'check':
            print('(Crash/restart) send Notification on Discord !')
            menu()
            sleep(1)
        elif checkIfProcessRunning('deadmatterServer-Win64-Shipping.exe') is True and Status == 'stop':
            os.system("taskkill /f /im  deadmatterServer-Win64-Shipping.exe")
            menu()
            sleep(1)          

def menu():
    checkrunning()    

if __name__ == "__main__":
    try:
        menu()

    except Exception as ex:
        print(f'Failure during startup. Please try again EX:{str(ex)}')