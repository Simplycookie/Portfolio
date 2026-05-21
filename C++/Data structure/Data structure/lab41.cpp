#include<iostream>
#include<E:\cookie work\visual studio\C++\Data structure\Data structure\Queues.cpp>
using namespace std;
struct person{
    public:
    string name;
    int flavour;
};
class person_queue{
    private:
    int_queue *iqueue;
    string_queue *squeue;
    
    public:
    int_string_queue(int size){
        iqueue = new int_queue(size);
        squeue = new string_queue(size);
    }
    void append(person p){
        iqueue->append(p.flavour);
        squeue->append(p.name);
    }
    void pop(person p){
        p.flavour = iqueue->pop();
        p.name = squeue->pop();
    }
    void clear(){
        iqueue->clear_queue();
        squeue->clear_queue();
    }
};

int main(){
    person people;
    person_queue que(2);
    string name;
    int flavour;
    cout<<"did you know the flavours of ice can determine a personality?\n\n";

}