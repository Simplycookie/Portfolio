#include<iostream>
using namespace std;
class Achievement{
    string name;
    int score;
    public:
    void set_data(){
        cout<<"Enter the class name                :";
        cin>>name;
        cout<<"The class achievement (%)           :";
        cin>>score;
        cout<<endl;
    }
    void Display(){
        cout<<"====================================\n";
        cout<<"               "<<name<<endl;
        cout<<"The Class Passing Grade Achievement: "<<score<<"%"<<endl;
        if(score>=50){
            if(score>=60){
                if(score>=70){
                    if(score>=85){
                        cout<<"*****";
                    }
                    else{cout<<"****";}
                }
                else{cout<<"***";}
            }
            else{cout<<"**";}
        }
        else{cout<<"poor achievement";}
        cout<<endl;
    }
};

int main(){
    Achievement schoolclass[4];
    cout<<"--------------------------------------------------------------"<<endl;
    cout<<"           Enter Class Achievement"<<endl;
    cout<<"--------------------------------------------------------------"<<endl;
    for (int i = 0; i < 4; i++)
    {
        schoolclass[i].set_data();
    }
    cout<<" THE SUMMARY OF UPSR TRIAL EXAM RESULT"<<endl;
    for (int i = 0; i < 4; i++)
    {
        schoolclass[i].Display();
    }
    
    
}