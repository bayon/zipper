'''
  ____    _____  ______   _______             _  _     _  _   
 |  _ \  / ____||  ____| |__   __|           | || |   (_)| |  
 | |_) || |  __ | |__       | |  ___    ___  | || | __ _ | |_ 
 |  _ < | | |_ ||  __|      | | / _ \  / _ \ | || |/ /| || __|
 | |_) || |__| || |____     | || (_) || (_) || ||   < | || |_ 
 |____/  \_____||______|    |_| \___/  \___/ |_||_|\_\|_| \__|
                       
                       v1.0 by Riyuzakisan
                            5/17/2013

    No attribution required. Feel free to modify & distribute.
            Updates & Info at: riyuzakisan.weebly.com
    

================[ EXAMPLE ]================
exampleFunction(parameter, +optional)


================[ HELPFUL ]================
pdir(object, +keyword)


================[ EVENTS ]================    
keyboard(key)
mouse(key)
    
Event Status:
    0 = Not Active
    1 = Just Pressed
    2 = Held Down
    3 = Just Released
    
    
================[ OBJECTS ]================
getRot(object)
setRot(object, rotation)

addObject(objectname, spawnname, +life, +scenename)
getObject(objectname, +inactive)
getObjects(scenename, +inactive)

getCamera(cameraname)
getCameras(scenename)

getLight(lightname)
getLights(scenename)


================[ SCENES ]================
getScene(scenename)
getSceneFromObject(object)

addScene(scenename)
removeScene(scenename)
restartScene(scenename/all)
'''

import math
from bge import logic, events

#=================[ HELPFUL ]=================#
#####
# Prints directory of object to console; Filters results with keyword
def pdir(object, keyword=''):
    _msg('Directory of "' + str(object) + '"; Class: "' + str(object.__class__) + '"')
    
    methods = []
    attributes = []
    
    for i in dir(object):
        if _isMethod(object, i) and keyword.lower() in i.lower():
            methods.append(i)
        elif keyword.lower() in i.lower():
            attributes.append(i)
    
    if len(methods):
        print('  METHODS:')
        
    for i in methods:
        print('    ' + i + '()')
        
        
    if len(attributes):
        print()
        print('  ATTRIBUTES:')
        
    for i in attributes:
        print('    ' + i)

#===#
# PRIVATE script function
def _isMethod(object, string):
    string = str(eval('object.' + string))
    if 'method' in string or 'function' in string:
        return True
    return False
            
#=================[ EVENTS ]==================#
# All event keys must be lowercase
keyboardEventKeys = {
    'a':events.AKEY, 'b':events.BKEY, 'c':events.CKEY, 'd':events.DKEY,
    'e':events.EKEY, 'f':events.FKEY, 'g':events.GKEY, 'h':events.HKEY,
    'i':events.IKEY, 'j':events.JKEY, 'k':events.KKEY, 'l':events.LKEY,
    'm':events.MKEY, 'n':events.NKEY, 'o':events.OKEY, 'p':events.PKEY,
    'q':events.QKEY, 'r':events.RKEY, 's':events.SKEY, 't':events.TKEY,
    'u':events.UKEY, 'v':events.VKEY, 'w':events.WKEY, 'x':events.XKEY,
    'y':events.YKEY, 'z':events.ZKEY,
    '0':events.ZEROKEY, '1':events.ONEKEY, '2':events.TWOKEY, '3':events.THREEKEY,
    '4':events.FOURKEY, '5':events.FIVEKEY, '6':events.SIXKEY, '7':events.SEVENKEY,
    '8':events.EIGHTKEY, '9':events.NINEKEY, 'escape':events.ESCKEY,
    'f1':events.F1KEY, 'f2':events.F2KEY, 'f3':events.F3KEY, 'f4':events.F4KEY,
    'f5':events.F5KEY, 'f6':events.F6KEY, 'f7':events.F7KEY, 'f8':events.F8KEY,
    'f9':events.F9KEY, 'f10':events.F10KEY, 'f11':events.F11KEY, 'f12':events.F12KEY,
    'accent':events.ACCENTGRAVEKEY, 'minus':events.MINUSKEY, 'equal':events.EQUALKEY,
    'leftbracket':events.LEFTBRACKETKEY, 'rightbracket':events.RIGHTBRACKETKEY,
    'backslash':events.BACKSLASHKEY,
    'semicolon':events.SEMICOLONKEY, 'quote':events.QUOTEKEY, 'comma':events.COMMAKEY,
    'period':events.PERIODKEY, 'slash':events.SLASHKEY,
    'tab':events.TABKEY, 'capslock':events.CAPSLOCKKEY, 'leftshift':events.LEFTSHIFTKEY,
    'leftctrl':events.LEFTCTRLKEY, 'leftalt':events.LEFTALTKEY, 'backspace':events.BACKSPACEKEY,
    'enter':events.RETKEY, 'rightshift':events.RIGHTSHIFTKEY, 'rightctrl':events.RIGHTCTRLKEY,
    'rightalt':events.RIGHTALTKEY, 'space':events.SPACEKEY,
    'insert':events.INSERTKEY, 'home':events.HOMEKEY, 'pageup':events.PAGEUPKEY,
    'delete':events.DELKEY, 'end':events.ENDKEY, 'pagedown':events.PAGEDOWNKEY,
    'uparrow':events.UPARROWKEY, 'downarrow':events.DOWNARROWKEY,
    'leftarrow':events.LEFTARROWKEY, 'rightarrow':events.RIGHTARROWKEY,
    'pad0':events.PAD0, 'pad1':events.PAD1, 'pad2':events.PAD2, 'pad3':events.PAD3,
    'pad4':events.PAD4, 'pad5':events.PAD5, 'pad6':events.PAD6, 'pad7':events.PAD7,
    'pad8':events.PAD8, 'pad9':events.PAD9, 'padaster':events.PADASTERKEY,
    'padenter':events.PADENTER, 'padminus':events.PADMINUS, 'padperiod':events.PADPERIOD,
    'padplus':events.PADPLUSKEY, 'padslash':events.PADSLASHKEY
}

mouseEventKeys = {
    'leftclick':events.LEFTMOUSE, 'rightclick':events.RIGHTMOUSE, 'middleclick':events.MIDDLEMOUSE,
    'scrollup':events.WHEELUPMOUSE, 'scrolldown':events.WHEELDOWNMOUSE,
    'mousex':events.MOUSEX, 'mousey':events.MOUSEY
}

#===#
# Gets keyboard event
def keyboard(key):
    kb = logic.keyboard.events
    
    key = str(key).lower()
    
    if key not in keyboardEventKeys:
        altkey = _getKeyAlts(key)
        if altkey == None:
            _msg('Key "' + key + '" not recognized.')
            return
        else:
            key = altkey
            
    if key in keyboardEventKeys:
        return kb[keyboardEventKeys[key]]
    
#===#
# Gets mouse event
def mouse(key):
    mouse = logic.mouse.events
    
    key = str(key).lower()
    
    if key not in mouseEventKeys:
        altkey = _getMouseAlts(key)
        if altkey == None:
            _msg('Key "' + key + '" not recognized.')
            return
        else:
            key = altkey
    
    if key in mouseEventKeys:
        return mouse[mouseEventKeys[key]]

#===#
# PRIVATE script function
def _getKeyAlts(key):
    alts = {
        '`':'accent', 'tilde':'accent', '~':'accent', '-':'minus', 'equals':'equal',
        '=':'equal', ',':'comma', '.':'period', ';':'semicolon', '\'':'quote', '"':'quote',
        '[':'leftbracket', ']':'rightbracket', '/':'slash', '\\':'backslash',
        'comma':',', 'period':'.', 'back':'backspace', 'ret':'enter',
        'cap':'capslock', 'caps':'capslock', 'lshift':'leftshift', 'lctrl':'leftctrl',
        'lalt':'leftalt', 'rshift':'rightshift', 'rctrl':'rightctrl', 'ralt':'rightalt',
        'p0':'pad0', 'p1':'pad1', 'p2':'pad2', 'p3':'pad3', 'p4':'pad4',
        'p5':'pad5', 'p6':'pad6', 'p7':'pad7', 'p8':'pad8', 'p9':'pad9',
        'p-':'padminus', 'pminus':'padminus', 'p+':'padplus', 'pplus':'padplus',
        'pperiod':'padperiod', 'p.':'padperiod', 'esc':'escape',
        'p/':'padslash', 'pslash':'padslash', 'p*':'padaster', 'paster':'padaster',
        'up':'uparrow', 'down':'downarrow', 'left':'leftarrow', 'right':'rightarrow'
    }
    
    if key in alts:
        return alts[key]
    
#===#
# PRIVATE script function
def _getMouseAlts(key):
    alts = {
        'lmb':'leftclick', 'mmb':'middleclick', 'rmb':'rightclick',
        'lclick':'leftclick', 'mclick':'middleclick', 'rclick':'rightclick',
        'mouseup':'scrollup', 'mousedown':'scrolldown'
    }
    
    if key in alts:
        return alts[key]

#=================[ OBJECTS ]=================#
#===#
# Gets rotation of KX_GameObject as list
def getRot(object):
    oldOri = object.orientation.to_euler()
    ori = [x*(180/math.pi) for x in oldOri]
    return ori

#===#
# Sets KX_GameObject's rotation with list, tuple, or vector
def setRot(object, rotation):
    ori = object.orientation.to_euler()
    rotation = [x / (180 / math.pi) for x in rotation]
    ori.x, ori.y, ori.z = rotation[0], rotation[1], rotation[2]
    ori = ori.to_matrix()
    object.orientation = ori


#===#
# Adds a new KX_GameObject to current scene
#   objectname = Name of object to add
#   spawnname = Name of existing object to add at
#   +life = Life of current object until deletion
#   +scenename = Scene name to add object to
def addObject(objectname, spawnname, life=0, scenename=None):
    if life.__class__ == str().__class__:
        scenename = life
        life = 0
    
    scene = getScene(scenename)
    
    objectToAdd = None
    spawnObject = None
    
    if scene:
        if 'KX_GameObject' in str(objectname.__class__):
            objectToAdd = objectname
        else:
            if objectname in scene.objectsInactive:
                objectToAdd = scene.objectsInactive[objectname]
            elif objectname in scene.objects:
                objectToAdd = scene.objects[objectname]
            else:
                _msg('Object "' + objectname + '" could not be found.')
        
        if 'KX_GameObject' in str(spawnname.__class__):
            spawnObject = spawnname
        else:
            if spawnname in scene.objects:
                spawnObject = scene.objects[spawnname]
            else:
                _msg('Spawn Object "' + spawnname + '" could not be found.')
            
        if objectToAdd and spawnObject:
            return scene.addObject(objectToAdd, spawnObject, life)
    else:
        _msg('Invalid Scene: "' + scenename + '"; ' + 'Scenes: ' + str(logic.getSceneList()))

#===#
# Checks all scenes for specific object; Can check inactive objects list
def getObject(objectname, inactive=False):
    for s in logic.getSceneList():
        if inactive:
            if objectname in s.objectsInactive:
                return s.objectsInactive[objectname]
        else:
            if objectname in s.objects:
                return s.objects[objectname]
    
    _msg('Object "' + objectname + '" could not be found')
    
#===#
# Gets object list of specific scene, or current scene
# Can return inactive objects list
def getObjects(scenename=None, inactive=False):
    scene = getScene(scenename)
    if scene:
        if inactive:
            return scene.objectsInactive
        return scene.objects
    
    
#===#
# Checks all scenes for specific camera
def getCamera(cameraname):
    for s in logic.getSceneList():
        if cameraname in s.cameras:
            return s.cameras[cameraname]
    _msg('Camera "' + cameraname + '" could not be found')

#===#
# Gets camera list of specific scene, or current scene
def getCameras(scenename=None):
    scene = getScene(scenename)
    if scene:
        return scene.cameras


#===#
# Checks all scenes for specific light
def getLight(lightName):
    for s in logic.getSceneList():
        if lightName in s.lights:
            return s.lights[lightName]
    _msg('Light "' + lightName + '" could not be found.')
    
#===#
# Gets light list of specific scene, or current scene
def getLights(scenename=None):
    scene = getScene(scenename)
    if scene:
        return scene.lights

    
#=================[ SCENES ]==================#
#===#
# Gets scene by name, or returns current scene
def getScene(scenename=None):
    scene = None
    
    if scenename:
        scenelist = logic.getSceneList()
        
        for i in scenelist:
            if i.name == scenename:
                scene = i
    else:
        scene = logic.getCurrentScene()
    
    return scene

#===#
# Finds scene that existing object belongs to
def getSceneFromObject(object):
    for i in logic.getSceneList():
        if object in i.objects:
            return i

#===#
# Adds new scene
def addScene(scenename, overlay=True):
    scene = getScene(scenename)
    
    if not scene:
        logic.addScene(scenename, overlay)
        return True
    return False

#===#
# Removes existing scene
def removeScene(scenename):
    scene = getScene(scenename)
    
    if scene:
        if len(logic.getSceneList()) == 1:
            _msg('Cannot remove scene "' + scenename + '"; Last scene in game!')
            return False
        scene.end()
        return True
    return False

#===#
# Restarts specific scene, or all scenes
#   Use True to restart all scenes
def restartScene(scenename):
    if scenename in [True, False]:
        if scenename:
            for i in logic.getSceneList():
                i.restart()
            return True
    else:
        scene = getScene(scenename)
        if scene:
            scene.restart()
            return True
        return False
            
#===#
# PRIVATE script function
def _msg(message):
    message = str(message)
    print('[TOOLKIT] ' + message)