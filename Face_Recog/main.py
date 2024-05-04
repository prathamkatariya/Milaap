import sys
import face_recognition

if len(sys.argv) > 1:
    database_image = sys.argv[1]
    upload_image = sys.argv[2]
    
    image_1 = face_recognition.load_image_file(database_image)
    image_2 = face_recognition.load_image_file(upload_image)
    
    # Find the face encodings for each face in the images
face_encodings_1 = face_recognition.face_encodings(image_1)
face_encodings_2 = face_recognition.face_encodings(image_2)

if len(face_encodings_1) == 0 or len(face_encodings_2) == 0:
    # print("00")
    exit()

  # Compare the face encodings
for encoding_1 in face_encodings_1:
    for encoding_2 in face_encodings_2:
        # Compare faces
        # results = face_recognition.compare_faces([encoding_1], encoding_2)
        distance = face_recognition.face_distance([encoding_1], encoding_2)
        threshold = 0.5 
        if distance[0] < threshold:
            # Matched
            print("1")   
        else:
             # Unmatched
            print("0")

