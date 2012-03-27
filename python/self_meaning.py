#!usr/bin/python

dictionary = {'CAR':'A car is a vehicle with 4 wheels', 
               'APPLE':'round fruit with red, green, or yellow color', 
               'TRIANGLE':'A triangle has three sides'
               
}

print "welcome to self-learning dictionary ver 1.0"


def get_meaning(name):
    """Returns meaning of the word by looking up in the
       dictionary. If no word is found, None is returned.
    """
    if name in dictionary.keys():
        return dictionary[name]
    else:
        return None
    
    
def save_meaning(name, meaning):
    """store the meaning of word, if not found in the dictionary"""
    dictionary[name] = meaning        

def word_meaning():
    while True:
        name = raw_input("Please enter a word: ")
        name = name.upper()
        x = get_meaning(name)
        if x == None:
            print "sorry, not found"
            choice = raw_input("Add to the dictionary: (y/n)")
            if choice == 'y':
                meaning = raw_input("meaning: ")
                save_meaning(name, meaning)
        else: 
            print "The meaning is %s" % x
        print "DEBUG: Dictionary contents are: %s" % dictionary
        


word_meaning()
