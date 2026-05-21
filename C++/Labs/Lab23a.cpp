#include<iostream>
using namespace std;

char grades(float Average){
    char grade;
    if(Average >= 80){grade = 'A';}
    else if (Average >= 60){grade = 'B';}
    else if (Average >= 50){grade = 'C';}
    else{grade = 'F';}
    return grade;    
}

int main(){
    char name[30],grade;
    float Marks[5],aver;
    cout<<"Enter name :";
    cin>>name;
    for(int i = 0;i < 5;i++){
        cout<<"Enter Marks :";
        cin>>Marks[i];
        aver += Marks[i];
    }
    aver = aver/5;
    grade = grades(aver);

    cout<<"\nName\t:"<<name<<endl;
    cout<<"Average\t:"<<aver<<endl;
    cout<<"grade\t:"<<grade;
}
