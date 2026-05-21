#include<iostream> 
#include<iomanip> 
#include<cstring> 
using namespace std; 
class Trivia 
{  private: 
    string name, country, game_name; 
    int age; 
    float score[3]; 
    char status [20];
    float total, avg; 
    public: 
    void setParticipant() 
{   
    cin.ignore(); 
    cout<<"\nEnter Name\t: "; 
    getline(cin,name); 
    cout<<"Enter Country\t: "; 
    getline(cin, country); 
    cout<<"Enter Age\t: "; 
    cin>>age; 
    cin.ignore(); 
    cout<<"Enter Game Name : "; 
    getline(cin, game_name);       
    
    for(int i = 0;i<3;i++){
        cout<<"Enter Score "<<i+1<<" ";
        cin>>score[i];
        total += score[i];
    }
    avg = total/3;
    }   
    
void set_status () 
{ 
    if (avg >= 80 && avg <= 100) 
    strcpy(status , "Excellent"); 
    else if (avg >= 60 && avg < 80) 
    strcpy(status , "Great"); 
    else  
    strcpy(status , "Keep Trying");
} 
void display_result(){
    cout<<"------------------------------"<<endl;
    cout<<"        RESULT SCORED "<<endl;
    cout<<"------------------------------"<<endl;
    cout<<"Name             :"<<name<<endl;
    cout<<"Country          :"<<country<<endl;
    cout<<"Age              :"<<age<<endl;
    cout<<"Game Name        :"<<game_name<<endl;
    cout<<"        Score 1  :"<<score[0]<<endl;
    cout<<"        Score 2  :"<<score[1]<<endl;
    cout<<"        Score 3  :"<<score[2]<<endl;
    set_status();
    cout<<"        Status   :"<<status;

}
}; 
int main() 
{
    int warriors;
    cout<<"How Many warriors? ";
    cin>>warriors;
    Trivia participent[warriors];
    for (int i = 0; i < warriors; i++)
    {
        participent[i].setParticipant();
        participent[i].display_result();
    }
    
}