#animation1.py

from graphics import *

def main():
    # have to have graphics.py installed 
    win = GraphWin()
    pt = Point(100,50)

    pt.draw(win)
    win.getMouse()

main()