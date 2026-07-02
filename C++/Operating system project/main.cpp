#include <iostream>
using namespace std;
#define Max_processes 10
#define Min_processes 3

// the defines are at the top to allow for easy modification, but not all that needed to be modified

struct process {
    bool active;
    int arrival_time;
    int burst_time;
    int remaining_time;
    int priority;
};
// the process structure is a variable which hold all the neccacary variables in a process
// might be subject to change? but it should be fine

struct block {
    int start_time;
    int process_index;
    block *next;
};
// A block is what I call the spaces in the gentt chart, this will hold the information of the block
// for the gentt chart display function (not yet made) to work. with pointers to another block to allow for infinite
// blocks to hold all gentt chart information


int get_int_input(){
    int choice = 0;
    int tens = 0;
    int index = 0;
    string input;//The use of a mediator string variable is used to input into in which then it would convert into an interger
    cout<<"Input Option Here : ";
    cin>>input;
    if(input[1]){
        tens = int(input[index]);
        tens -= 48;
        if(tens < 0 or tens >9){
            tens = -2;
        }
        else{
            tens *= 10;
            index++;
        }
    }
    choice = int(input[index]);
    choice -= 48;
    if(choice < 0 or choice >9){
            choice = -1;
        }
    
    if(tens==-1 and choice==-1){
        return -1;
    }
    else{
        if(choice==-1){
            choice = 0;
        }
        if(tens==-1){
            tens = 0;
        }
        choice += tens;
        return choice;
    }
}
//this is a modified function i pulled from another project,
//it serves the roll of making sure the user inputs aren't looping constantly giving that menu glitch.


//The process_table class is meant to allow all the processes to already be lined up, prepared,
//Save, and loaded into one collective structure, this should be the variable sent for the 
//Scheduling to work. You should need to worry too much, I recommend 
class process_table {
    public:
    process table[10];
    int process_tracker;

    process_table(){
        process_tracker = 0;
        for(int i = 0;i < Max_processes;i++){
            table[i].active = false;
            table[i].arrival_time = 0;
            table[i].burst_time = 0;
            table[i].priority = 0;
            table[i].remaining_time = table[i].burst_time;
        }
    }

    bool is_full(){
        if(process_tracker >= Max_processes){
            return true;
        }
        else return false;
    }

    bool is_empty(){
        if(process_tracker == 0){
            return true;
        }
        else return false;
    }

    bool validate(){
        if(process_tracker >= Min_processes && !is_full()){
            return true;
        }
        else return false;
    }

    void move_process(int process_index, int location){
        process temp = table[location];
        table[location] = table[process_index];
        table[process_index] = temp;
        
    }

    void cascade_processes(){
        for (int i = 0; i < Max_processes-2; i++)
        {
            for(int j = Max_processes-2; j >= i; j--){
                if(table[j].active==false and table[(j+1)].active==true){
                    move_process(j+1,j);
                    cout<<"P"<<j<<" <-> P"<<j+1<<endl;
                }
            }
        }
    }

    void add_process(){
        if(is_full()==false){
            table[process_tracker].active = true;
            edit_process(process_tracker);
            process_tracker++;
        }
        else{
            cout<<"full"<<endl;
        }

    }

    void add_process(int Arrival_time, int Burst_time, int Priority){
        if(is_full()==false){
            table[process_tracker].active = true;
            table[process_tracker].arrival_time = Arrival_time;
            table[process_tracker].burst_time = Burst_time;
            table[process_tracker].priority = Priority;
            process_tracker++;
        }
        else{
            cout<<"full"<<endl;
        }
    }

    void edit_menu(int show_process = 0){
        if(show_process == 1){
            view_processes();
        }
        int choice;
        for(int i = 0;i < process_tracker;i++){
            cout<<i+1<<". [-P"<<i<<endl;
        }
        cout<<"0. -exit-\n"<<endl;
        choice = get_int_input();
        if(choice==-1){
            return;
        }
        else if (choice >= 0 and choice < process_tracker)
        {
            edit_process(choice);
            return;
        }
        else return;
        
    }

    void edit_process(int process_index){
        while(true){
            int choice;
            int value;
            cout<<"P"<<process_index<<endl;
            cout<<"|-Arrival Time :"<<table[process_index].arrival_time<<"ms\t-|"<<endl;
            cout<<"|-Burst Time   :"<<table[process_index].burst_time<<"ms\t-|"<<endl;
            cout<<"|-Priority     :"<<table[process_index].priority<<"\t-|"<<endl;
            const int menu_size = 3;
            string *pre_text;
            pre_text = new string[menu_size];
            pre_text[0] = "1. [-Arrival Time-]";
            pre_text[1] = "2. [-Burst Time-]";
            pre_text[2] = "3. [-Priority-]";
            
            for(int i = 0;i<menu_size;i++){
                cout<<pre_text[i]<<endl;
            }
            cout<<"0. -exit-\n"<<endl;
            delete[] pre_text;
            pre_text = NULL;

            choice = get_int_input();
        switch (choice)
        {
        case 1:
            cout<<"enter new value:";
            cin>>value;
            table[process_index].arrival_time = value;
            break;

        case 2:
            cout<<"enter new value:";
            cin>>value;
            table[process_index].burst_time = value;
            break;

        case 3:
            cout<<"enter new value:";
            cin>>value;
            table[process_index].priority = value;
            break;

        case 0:
            return;
            break;
        
        default:
            cout<<"Please input a valid option"<<endl;
            break;
        }
        }



    }

    void delete_menu(int show_process = 0){
        if(show_process == 1){
            view_processes();
        }
        int choice;
        for(int i = 0;i < process_tracker;i++){
            cout<<i+1<<". [-P"<<i<<endl;
        }
        cout<<"0. -exit-\n"<<endl;
        choice = get_int_input();
        if(choice==-1){
            return;
        }
        else if (choice >= 0 and choice < process_tracker)
        {
            delete_process(choice);
            return;
        }
        else return;
    }

    void delete_process(int process_index){
        int choice = 0;
        cout<<"are you sure you want to delete P"<<process_index<<"?"<<endl;
        cout<<"1. yes"<<endl;
        cout<<"0. No"<<endl;
        choice = get_int_input();
        switch (choice)
        {
        case 1:
            table[process_index].active = 0;
            table[process_index].arrival_time = 0;
            table[process_index].burst_time = 0;
            table[process_index].priority = 0;
            cascade_processes();
            process_tracker--;
            cout<<"P"<<process_index<<" Has been deleted and processes cascaded"<<endl;
            break;
        
        case 0:
            cout<<"canceling process"<<endl;
            break;
            return;
        default:
            cout<<"Invalid Input"<<endl;
            return delete_process(process_index);
            break;
        }
    }

    void view_processes(){
        if(is_empty()){
            cout<<"empty"<<endl;
            return;
        }
        for (int i = 0; i < process_tracker; i++)
        {
            if(table[i].active){
                cout<<"|P"<<i<<endl;
                cout<<"|-Arrival Time :"<<table[i].arrival_time<<"ms\t-|"<<endl;
                cout<<"|-Burst Time   :"<<table[i].burst_time<<"ms\t-|"<<endl;
                cout<<"|-Priority     :"<<table[i].priority<<"\t-|"<<endl;
            }
            else{
                cascade_processes();
                if(table[0].active == true){
                    cout<<"|P"<<i<<endl;
                    cout<<"|-Arrival Time :"<<table[i].arrival_time<<"ms\t-|"<<endl;
                    cout<<"|-Burst Time   :"<<table[i].burst_time<<"ms\t-|"<<endl;
                    cout<<"|-Priority     :"<<table[i].priority<<"\t-|"<<endl;
                }
                else{
                    process_tracker = 0;
                    cout<<"no processes detected"<<endl;
                }
            }
        }
    }

    void view_table(){
        if(is_empty()){
            cout<<"empty"<<endl;
            return;
        }
        for (int i = 0; i < process_tracker; i++)
        {
            if(table[i].active){
                cout<<"|P"<<i;
                cout<<"|-Arrival Time :"<<table[i].arrival_time<<"ms\t";
                cout<<"|-Burst Time :"<<table[i].burst_time<<"ms\t";
                cout<<"|-Priority :"<<table[i].priority<<"\t-|"<<endl;
            }
            else{
                cascade_processes();
                if(table[0].active == true){
                    cout<<"|P"<<i;
                    cout<<"|-Arrival Time :"<<table[i].arrival_time<<"ms\t";
                    cout<<"|-Burst Time :"<<table[i].burst_time<<"ms\t";
                    cout<<"|-Priority :"<<table[i].priority<<"\t-|"<<endl;
                }
                else{
                    process_tracker = 0;
                    cout<<"no processes detected"<<endl;
                }
            }
        }
    }

    void menu(int show_process = 0){
        if(show_process == 1){
            view_processes();
        }
        int choice;
        string input;
        const int menu_size = 5;
        string *pre_text;
        pre_text = new string[menu_size];
        pre_text[0] = "1. [-view processes-]";
        pre_text[1] = "2. [-view table-]";
        pre_text[2] = "3. [-add process-]";
        pre_text[3] = "4. [-edit process-]";
        pre_text[4] = "5. [-delete process-]";

        for(int i = 0;i<menu_size;i++){
            cout<<pre_text[i]<<endl;
        }
        cout<<"0. -exit-\n"<<endl;
        delete[] pre_text;
        pre_text = NULL;

        choice = get_int_input();
        switch (choice)
        {
        case 1:
            view_processes();
            return menu();
            break;

        case 2:
            view_table();
            return menu();
            break;

        case 3:
            add_process();
            return menu();
            break;

        case 4:
            edit_menu(1);
            return menu();
            break;

        case 5:
            delete_menu(1);
            return menu();
            break;

        case 0:
            break;
        
        default:
            cout<<"Please input a valid option"<<endl;
            return menu();
            break;
        }


        
    }
};
//you don't have to worry too much about this, use the menu to modify the table and send to table to
//run your scheduling function.
//likely some parts are likely to change such as a save and load system to allow for much fast testing

int main_menu(){
    cout<<"1. [-edit process table-]"<<endl;
    cout<<"2. [-run table-]"<<endl;
    cout<<"0. -End Session-"<<endl;

    int choice = get_int_input();
    return choice;
}
//the current main menu is small and doesn't have a lot, I will likely make another menu to shift through
//options like scheduling or saving and loading, or shifting through different tables, but.
//you can simply use the run table section to use the menu to run your scheduling.

void run_table(){
    //Add you schedule function
}

int main()
{
    process_table table1;
    table1.add_process(0,10,3);
    table1.add_process(4,5,1);
    table1.add_process(9,7,2);
    table1.add_process(2,3,4);
    table1.add_process(13,2,5);
    //this is pre prepuration of the table for faster testing.

    while (true)
    {
        int choice = main_menu();

        switch (choice)
        {
        case 1:
            table1.menu();
            break;

        case 2:
            //Add you run software
            break;

        case 0:
            cout<<"session ended"<<endl;
            return 0;
            break;
        default:
            cout<<"Please input a valid option"<<endl;
            break;
        }
    }
    
}
