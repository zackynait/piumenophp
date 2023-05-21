from time import sleep

# Press Maiusc+F10 to execute it or replace it with your code.
# Press Double Shift to search everywhere for classes, files, tool windows, actions, and settings.

import win32api, win32con


def click(x, y):
    win32api.SetCursorPos((x, y))
    win32api.mouse_event(win32con.MOUSEEVENTF_LEFTDOWN, x, y, 0, 0)
    win32api.mouse_event(win32con.MOUSEEVENTF_LEFTUP, x, y, 0, 0)

def vai():

    #click(60, 610)
    click(710, 1410)
    sleep(1)
    #click(60, 610)
    click(710, 1410)
    sleep(300)
    vai()

# Press the green button in the gutter to run the script.
if __name__ == '__main__':
    vai()

# See PyCharm help at https://www.jetbrains.com/help/pycharm/
