#include <iostream>
using namespace std;
class int_queue{
    private:
    int *arr, topindex, head, max;
    public:
    int_queue(int size){
        max = size;
        clear_queue();
        arr = new int[max];
    }
    void clear_queue(){
        topindex = -1;
        head = 0;
    }   
    void append(int a){
        if(!full){
            topindex++;
            arr[topindex] = a; 
        }
        else{cout<<"queue is full\n";}
    }
    int pop(){
        if(!empty){
            head++;
            return(arr[head-1]);
        }
        else{
            cout<<"queue is empty\n";
            return int(NULL);
        }
    }
    int front(){
        if(!empty){
            return(arr[head]);
        }
        else{
            cout<<"queue is empty\n";
            return int(NULL);
        }
    }

    int full(){
        if(topindex == max-1){
            return 1;
        }
        else{
            return 0;
        }
    }
    int empty(){
        if(head > topindex){
            return 1;
        }
        else{
            return 0;
        }
    
    }
};

class char_queue {
    private:
    char *arr;
    int topindex, head, max;
    public:
    char_queue(int size) {
        max = size;
        clear_queue();
        arr = new char[max];
    }
    void clear_queue() {
        topindex = -1;
        head = 0;
    }
    void append(char a) {
        if (!full()) {
            topindex++;
            arr[topindex] = a;
        } else {
            cout << "queue is full\n";
        }
    }
    char pop() {
        if (!empty()) {
            head++;
            return arr[head - 1];
        } else {
            cout << "queue is empty\n";
            return char(NULL);
        }
    }
    char front() {
        if (!empty()) {
            return arr[head];
        } else {
            cout << "queue is empty\n";
            return char(NULL);
        }
    }
    int full(){
        if(topindex == max-1){
            return 1;
        }
        else{
            return 0;
        }
    }
    int empty(){
        if(head > topindex){
            return 1;
        }
        else{
            return 0;
        }
    
    }    
};

class string_queue {
    private:
    string *arr;
    int topindex, head, max;
    public:
    string_queue(int size) {
        max = size;
        clear_queue();
        arr = new string[max];
    }
    void clear_queue() {
        topindex = -1;
        head = 0;
    }
    void append(string a) {
        if (!full()) {
            topindex++;
            arr[topindex] = a;
        } else {
            cout << "queue is full\n";
        }
    }
    string pop() {
        if (!empty()) {
            head++;
            return arr[head - 1];
        } else {
            cout << "queue is empty\n";
            return string();
        }
    }
    string front() {
        if (!empty()) {
            return arr[head];
        } else {
            cout << "queue is empty\n";
            return string();
        }
    }
    int full() {
        if (topindex == max - 1) {
            return 1;
        } else {
            return 0;
        }
    }
    int empty() {
        if (head > topindex) {
            return 1;
        } else {
            return 0;
        }
    }
};



