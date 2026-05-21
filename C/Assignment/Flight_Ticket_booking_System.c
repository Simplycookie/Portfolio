#include <stdio.h>
#include <string.h>
#define Max_no_Bookings 100
#define Max_no_Flights 13
// Structure flight holds all the deta of a FLight
struct Flight_d
{
    int Flight_capacity_data[3][30];
    float Flight_class_price[3];
    char destinations[3][15];
} Flight_details[13];
// Flight display prototype
void Flight_details_display(int id);
// loader prototype
void Flight_loader();

// Define the Booking structure
struct Booking {
    int flight;
    int class;
    int seat;
    char destinations[30];
    char Name[50];
};

// Global variable to store the number of bookings
int Book_size;

// Function prototypes
void Booking_loader(struct Booking Booking_details[Max_no_Bookings]);
void Booking_display(struct Booking Booking_details[Max_no_Bookings]);
void save(struct Booking Booking_details[Max_no_Bookings]);
void Cancel_Booking(struct Booking Booking_details[Max_no_Bookings]);
// Function Prototypes
void displayMenu();
void Display_bookings_option(struct Booking Booking_details[Max_no_Bookings]);
void Make_Booking_option(struct Booking Booking_details[Max_no_Bookings]);

int main() {
    struct Booking Booking_details[Max_no_Bookings];
    Flight_loader();
    int choice;
    
    do {
        displayMenu();
        printf("Enter your choice: ");
        scanf("%d", &choice);
        getchar(); // Clear newline character
        
        switch (choice) {
            case 1:
                printf("\n--- Book a Ticket ---\n");
                Make_Booking_option(Booking_details);
                break;
            case 2:
                printf("\n--- View Bookings ---\n");
                Display_bookings_option(Booking_details);
                break;
            case 3:
                printf("\n--- Cancel a Ticket ---\n");
                Cancel_Booking(Booking_details);
                break;
            case 4:
                printf("\nExiting the program.\n");
                break;
            default:
                printf("\nInvalid choice. Please try again.\n");
        }
    } while (choice != 4);
    
    return 0;
}

//------------------------------------------------------------------------------------------------------------------------------
//                                           Main Functions like the Manu, and options
//------------------------------------------------------------------------------------------------------------------------------

void displayMenu() {
    printf("\n===================================\n");
    printf("  Flight Ticket Booking System\n");
    printf("===================================\n");
    printf("1. Book a Ticket\n");
    printf("2. View Bookings\n");
    printf("3. Cancel a Ticket\n");
    printf("4. Exit\n");
    printf("===================================\n");
}

void Cancel_Booking(struct Booking Booking_details[Max_no_Bookings]){
    Display_bookings_option(Booking_details);
    int choice;
    if(Book_size==0){
        printf("no bookings. the program will terminate.");
        return;
    }
    else{
        printf("which booking do you want to cancel : ");
        scanf("%d",&choice);
        if(choice<=0||choice>Book_size){return;}
    }
    Flight_details[Booking_details[choice-1].flight-1].Flight_capacity_data[Booking_details[choice-1].class-1][Booking_details[choice-1].seat-1] = 0;
    Booking_details[choice-1].flight = 0;
    Booking_details[choice-1].class = 0;
    Booking_details[choice-1].seat = 0;
    strcpy(Booking_details[choice-1].destinations,"");
    strcpy(Booking_details[choice-1].Name,"");
    save(Booking_details);
    return;
}
void Display_bookings_option(struct Booking Booking_details[Max_no_Bookings]){
    // Load booking details from file
    Booking_loader(Booking_details);
    // Display booking details
    Booking_display(Booking_details);
}


void Make_Booking_option(struct Booking Booking_details[Max_no_Bookings]){
    int flight_id,count;
    char Name[50];
    Booking_loader(Booking_details);
    printf("\nEnter Your Name:");
    scanf("%s",Name);

    printf("Flights:");
    for(count=0;count<Max_no_Flights;count++){ //displays short flight details
        printf("\n-------------------------------------------------------");
        printf("\nFlight ID [%d]",count+1);
        printf("\nDestination \t: %s",Flight_details[count].destinations[0]);
        printf("\nDate \t: %s",Flight_details[count].destinations[1]);
        printf("\nTime \t: %s",Flight_details[count].destinations[2]);
    }
    printf("\n-------------------------------------------------------");

    do{
    printf("\nenter a valid flight id 1-13 : ");
    scanf("%d",&flight_id);
    }while(flight_id <= 0 || flight_id > Max_no_Flights);

    int class_c,seat_c,valid;
    Flight_details_display(flight_id-1);
    do{
        valid=1;
        printf("Which class do you want : ");
        scanf("%d",&class_c);
        printf("which seat do you want : ");
        scanf("%d",&seat_c);
        if(!(class_c>0 && class_c<=3) || !(seat_c>0 && seat_c<=30)){
            printf("invalid class and/or seating\n");
            valid=0;
        }
        else if(Flight_details[flight_id-1].Flight_class_price[class_c-1] == 0 || Flight_details[flight_id-1].Flight_capacity_data[class_c-1][seat_c-1] == 1 ){
            printf("seat unavalible\n");
            valid=0;
        }
    }while(valid==0);
    printf("do you want to confirm? [1=yes] : ");
    scanf("%d",&valid);

    if(valid==1){
        Booking_details[Book_size].class=class_c;
        Booking_details[Book_size].seat=seat_c;
        Booking_details[Book_size].flight=flight_id;
        strcpy(Booking_details[Book_size].destinations,Flight_details[flight_id-1].destinations[0]);
        strcpy(Booking_details[Book_size].Name,Name);
        Flight_details[flight_id-1].Flight_capacity_data[class_c-1][seat_c-1]=1;
        save(Booking_details);
    }

    
}

//------------------------------------------------------------------------------------------------------------------------------
//                                                  Booking Functions
//------------------------------------------------------------------------------------------------------------------------------

void Booking_display(struct Booking Booking_details[Max_no_Bookings]) {
    for (int count = 0; count < Book_size; count++){
        printf("\nBooking (%d)\n", count + 1);
        printf("--------------------------\n");
        printf("Flight_ID \t: %d\n", Booking_details[count].flight);
        printf("Destination\t: %s\n", Booking_details[count].destinations);
        printf("Name\t\t: %s\n", Booking_details[count].Name);
        printf("Class \t\t: %d\n", Booking_details[count].class);
        printf("Seat \t\t: %d\n", Booking_details[count].seat);
        printf("--------------------------\n");
    }
}


//Booking_loader
void Booking_loader(struct Booking Booking_details[Max_no_Bookings]) {
    FILE *fp;
    int flight_id, class_type, seat_number;
    char Destination[30], Name[50];
    int count = 0,Valid = 1;
    
    // Open the file for reading
    fp = fopen("Booking_details.txt", "r");
    if (fp == NULL) {
        printf("Error: Could not open Booking_details.txt\n");
        return;
    }
    
    // Read booking details from file
    int book_size=0;
    while (count < Max_no_Bookings && Valid == 1) {
        fscanf(fp, "%d %d %d %s %s", &flight_id, &class_type, &seat_number, Destination, Name);
        if(flight_id==0){Valid = 0;}
        else{
        Booking_details[count].flight = flight_id;
        Booking_details[count].class = class_type;
        Booking_details[count].seat = seat_number;
        strcpy(Booking_details[count].destinations,Destination);
        strcpy(Booking_details[count].Name,Name);
        book_size++;
        count++;
        }
    }
    Book_size = book_size;
    printf("Booking details successfully loaded.\n");
    printf("number of booking: %d",Book_size);
    // Close the file
    fclose(fp);
}


//------------------------------------------------------------------------------------------------------------------------------
//                                                FLight_base Functions
//------------------------------------------------------------------------------------------------------------------------------

// the flight display function
void Flight_details_display(int id){
    int i,j,p,q;
    // displays the destination, time and date
    printf("going to %s at %s around %s\n",Flight_details[id].destinations[0],Flight_details[id].destinations[1],Flight_details[id].destinations[2]);
    for (i = 0; i < 3; i++)
    {
        // displays each layer of class costs and seat capacity, will not display if cost= 0
        if(Flight_details[id].Flight_class_price[i] > 0.001){
            printf("class %d Cost: RM%.2f\n",i+1,Flight_details[id].Flight_class_price[i]);
            printf("----------------------------------------\n");
            // a long chain of for statements to allow for mimicry of a plane seat row layout
            for (j = 0; j < 3; j++){
                for (p = 0; p < 2; p++){
                    for (q = 0; q < 5; q++){
                        //a mathamatic equition that accounts for looping terms
                        //a new-line every 5 loops
                        //and adding new line every 10 loops
                        //also allows for alternating numbering for each new line
                        printf("%d",2*q+1+(1*p)+(10*j));
                        if((2*q+1+(1*p)+(10*j))<10 ){printf(" ");}
                        //checks if the seat is open or not (1:filled, 0:open)
                        if (Flight_details[id].Flight_capacity_data[i][2*q+(1*p)+(10*j)] != 1)
                            {printf("[ open ]\t");}
                        else{printf("[filled]\t");}
                    }
                    printf("\n");
                }
                printf("\n");
            }
            
        }
    }
}


//a loader, due to limitations 2 files must be opened seperatly for seats and destination plus cost
void Flight_loader(){
    FILE *fp1,*fp2;
    int seat,count=0,state1=0,state2=0;
    char destination[30];
    float class_price = 0;
    fp1 = fopen("Flight_deta_seats.txt","r");
    fp2 = fopen("Flight_deta_dest.txt","r");
    // File error check in regards to cannot be opened
    if(fp1 == NULL || fp2 == NULL){
        printf("File could not be opened!\nProgram stopped.\n");
        return;
    }
    // File loading into the Flight Stucture seat details
    while (fscanf(fp1,"%d",&seat)==1)
    {
        Flight_details[state2].Flight_capacity_data[state1][count] = seat;
        count++;
        if (count == 30)
        {
            count = 0;
            state1++;
            if (state1 == 3)
            {
                state1 = 0;
                state2++;
            }
        }
    }
    state2=0,state1=0;
    // File loading destination details and class price details
    while (fscanf(fp2,"%s %f",destination,&class_price)==2){
        strcpy(Flight_details[state2].destinations[state1],destination);
        Flight_details[state2].Flight_class_price[state1] = class_price;
        state1++;
        printf(Flight_details[state2].destinations[state1]);
        if (state1==3)
        {
            state1=0;
            state2++;
        }
        
    }
    fclose(fp1);
    fclose(fp2);
    printf("loading completed\n");
    return;
}

//------------------------------------------------------------------------------------------------------------------------------
//                                                      save functions
//------------------------------------------------------------------------------------------------------------------------------

void save(struct Booking Booking_details[Max_no_Bookings]){
    FILE *fp,*fp2;//create a new file called fp
    int book_size=0;
    int count=0,counter=0;
    fp=fopen("Booking_details.txt","w");//open booking_details.txt for writing
    if(fp==NULL){
        printf("file unable to open");
    }
    else{
        while(counter < 10){
            if(Booking_details[count].flight!=0){
                //write 3 integers and 2 char into in fp
                fprintf(fp,"%d %d %d %s %s",Booking_details[count].flight, Booking_details[count].class, Booking_details[count].seat, Booking_details[count].destinations, Booking_details[count].Name);
                fprintf(fp,"\n");
                book_size++;
                counter=0;
            }
            count++;
            counter++;
        }
        count = 0;
        while(count < Max_no_Bookings){
            fprintf(fp,"%d %d %d",0,0,0);
            fprintf(fp,"\n");
            count++;
        }
        fclose(fp);
        fp2=fopen("Flight_deta_seats.txt","w");
        if(fp2==NULL){
            printf("file unable to open");
        }
        else{
        int i=0,j=0,p=0;
        for(i=0;i<Max_no_Flights;i++){

            for(j=0;j<3;j++){

                for(p=0;p<30;p++){//loop 30 times
                    fprintf(fp2,"%d ",Flight_details[i].Flight_capacity_data[j][p]);
                }
                fprintf(fp2,"\n");
            }
        }
        }
        //end of else
        printf("done saving");
        }
    fclose(fp2);
}