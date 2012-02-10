#!usr/bin/python

DICTIONARY = {}

DICTIONARY_FILENAME = "words.txt"

print "welcome to self-learning dictionary ver 1.1"

def save_dictionary_to_file(filename, name, dic):
    """This function writes out a new word with meaning to the file"""
    try:
        out_file = open(filename, 'a')
        output_line = "%s: %s\n" % (name, dic[name])
        out_file.write(output_line)
    except IOError, ex:
        print "Error: can\'t find file or read data. Error: %s" % str(ex)
    else:
        out_file.close()
    
def read_dictionary(filename, dic):
    """This function reads out words with meaning from the file and     stores it 
    it in the in-memory associative array   
    """
    try:
        f = open(filename, 'r')
        for line in f:
            	line = line.strip()
            	s = line.split(':')
                word = s[0]
                meaning = s[1:]     
                x = ' '.join(meaning)
                dic[word] = x
        print "DEBUG: read_dictionary:  %s" % dic
    except IOError, ex:
        print "Error: can\'t find file or read data. Error: %s" % str(ex)
    else:
        f.close()
    
def get_meaning(name, dic):
    """Returns meaning of the word by looking up in the
       dictionary. If no word is found, None is returned.
    """
    print "DEBUG: get_meaning: name=%s dic=%s" % (name, dic)
    if name in dic.keys():
    	print "meaning: %s" % dic[name]
        return dic[name]
    else:
        return None
    
def save_meaning(name, meaning, dic):
    """store the meaning of word, if not found in the dictionary"""
    dic[name] = meaning        

def word_meaning():
    read_dictionary(DICTIONARY_FILENAME, DICTIONARY)
    while True:
        name = raw_input("Please enter a word: ")
        name = name.upper()
        x = get_meaning(name, DICTIONARY)
        if x == None:
            print "sorry, not found"
            choice = raw_input("Add to the dictionary: (y/n)")
            if choice == 'y':
                meaning = raw_input("meaning: ")
                save_meaning(name, meaning, DICTIONARY)
                save_dictionary_to_file(DICTIONARY_FILENAME, name, DICTIONARY)
        else: 
            print "The meaning is %s" % x
        print "DEBUG: Dictionary contents are: %s" % DICTIONARY
        
word_meaning()

