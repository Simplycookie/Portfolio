#include <iostream>
using namespace std;

class char_stack{
    private:
    int max;
    int topindex;
    char *stack;
    public:
    char_stack(int size){
        max = size;
        topindex = -1;
        stack = new char[max];
    }
    ~char_stack(){
        delete[] stack;
    }
    int full(){
        if(topindex == max - 1)
            return 1;
        else
            return 0;
    }
    int empty(){
        if(topindex == -1)
            return 1;
        else
            return 0;
    }
    void push(char letter){
        if(!full()){
            topindex++;
            stack[topindex] = letter;
        }
        else
            cout << "Stack is full" << endl;
    }
    char pop()
    {
        if(!empty()){
            char letter = stack[topindex];
            topindex--;
            return letter;
        }
        else{
            cout<<"Stack is empty"<<endl;
           return char(NULL);
        }
    }
    char top(){
        if(!empty()){
            return stack[topindex];
        }
        else{
            cout<<"Stack is empty"<<endl;
            return char(NULL);
        }
    }
};

class int_stack{
    private:
    int max;
    int topindex;
    int *stack;
    public:
    int_stack(int size){
        max = size;
        topindex = -1;
        stack = new int[max];
    }
    ~int_stack(){
        delete[] stack;
    }
    int full(){
        if(topindex == max - 1)
            return 1;
        else
            return 0;
    }
    int empty(){
        if(topindex == -1)
            return 1;
        else
            return 0;
    }
    void push(int number){
        if(!full()){
            topindex++;
            stack[topindex] = number;
        }
        else
            cout << "Stack is full" << endl;
    }
    int pop()
    {
        if(!empty()){
            int number = stack[topindex];
            topindex--;
            return number;
        }
        else{
            cout<<"Stack is empty"<<endl;
            return int(NULL);
        }
    }
    int top(){
        if(!empty()){
            return stack[topindex];
        }
        else{
            cout<<"Stack is empty"<<endl;
            return int(NULL);
        }
    }
};