#include <stdio.h>
#include <string.h>
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
void Booking_loader(struct Booking Booking_details[100]);
void Booking_display(struct Booking Booking_details[100]);
void Display_bookings_option(struct Booking Booking_details[100]);


int main(){
    struct Booking Booking_details[100];
    Display_bookings_option(Booking_details);
}

void Display_bookings_option(struct Booking Booking_details[100]){
    // Load booking details from file
    Booking_loader(Booking_details);
    // Display booking details
    Booking_display(Booking_details);

}

void Booking_display(struct Booking Booking_details[100]) {
    for (int count = 0; count < Book_size; count++){
        printf("Booking (%d)\n", count + 1);
        printf("--------------------------\n");
        printf("Flight_ID \t: %d\n", Booking_details[count].flight);
        printf("Class \t\t: %d\n", Booking_details[count].class);
        printf("Seat \t\t: %d\n", Booking_details[count].seat);
        printf("--------------------------\n");
    }
}

//Booking_loader
void Booking_loader(struct Booking Booking_details[100]) {
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
    while (count < 100 && Valid == 1) {
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
    printf("number of bookings: %d\n",Book_size);
    // Close the file
    fclose(fp);
}





